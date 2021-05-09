<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralResource;
use App\Imports\NewUserImport;
use App\Services\Account\LogNewUserUploaderService;
use App\Services\Account\UserProfileService;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

/**
 * @group Account
 *
 * API for managing account
 */
class UserProfileController extends Controller
{
    protected $statusCode = 200;

    public function __construct()
    {
        $this->userProfileService = new UserProfileService();
        $this->logNewUserUploaderService = new LogNewUserUploaderService();
    }

    /**
     * Profile Info.
     *
     * profile information of the user
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $profile = $this->userProfileService->show(request()->user()->id, 'id');
        return (new GeneralResource($profile))->response()->setStatusCode(200);
    }

    public function add(Request $request)
    {
        $profile = $this->userProfileService->update($request, request()->user()->id);
        return (new GeneralResource($profile))->response()->setStatusCode(200);
    }

    public function uploadAvatar(Request $request)
    {
        $user = Auth::user();
        if (isset($request['avatar'])) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }
        return (new GeneralResource($request))->response()->setStatusCode(200);
    }

    public function import($id)
    {
        $importData = $this->logNewUserUploaderService->show($id);
        if($importData->status != 'success'){
            $file = $importData->uploaded_file;
            $fullpath = env('APP_PATH').'/storage/app/public/'.$file;

            $importResult = $this->logNewUserUploaderService->update(new Request([
                'status' => 'success',
                'result_info' => 'data ummat telah berhasil di masukkan'
            ]), $id);

            return (new GeneralResource([
                'data' => $importResult,
            ]))->response()->setStatusCode($this->statusCode);
        } else {
            return (new GeneralResource([
                'data' => [
                    'error' => 'import status was successed'
                ],
            ]))->response()->setStatusCode($this->statusCode);   
        }
    }
}
