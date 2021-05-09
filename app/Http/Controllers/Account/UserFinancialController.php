<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralResource;
use App\Services\Account\UserFinancialService;
use Illuminate\Http\Request;
use Auth;

/**
 * @group Account
 *
 * API for managing account
 */
class UserFinancialController extends Controller
{
    protected $statusCode = 200;

    public function __construct()
    {
        $this->userFinancialService = new UserFinancialService();
    }

    /**
     * financial Info.
     *
     * financial information of the user
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $financial = $this->userFinancialService->all();
        return (new GeneralResource($financial))->response()->setStatusCode(200);
    }

    public function show($id)
    {
        $financial = $this->userFinancialService->show($id);
        return (new GeneralResource($financial))->response()->setStatusCode(200);
    }

    public function add(Request $request)
    {
        $financial = $this->userFinancialService->add($request, request()->user()->id);
        return (new GeneralResource($financial))->response()->setStatusCode(200);
    }

    public function update(Request $request, $id)
    {
        $financial = $this->userFinancialService->update($request, $id);
        return (new GeneralResource($financial))->response()->setStatusCode(200);
    }

    public function uploadBuktiTransfer(Request $request, $id)
    {
        $user = Auth::user();
        if (isset($request['buktitransfer'])) {
            $buktiTrasnfer = $user->addMediaFromRequest('buktitransfer')->toMediaCollection('buktitransfers');
            if(isset($buktiTrasnfer->order_column)){
                $updateDetail = [
                    'bukti_transfer'    => $buktiTrasnfer->order_column.'/'.$buktiTrasnfer->file_name
                ];
                $financial = $this->userFinancialService->update(collect($updateDetail), $id);

                return (new GeneralResource($financial))->response()->setStatusCode(200);
            }
        }
        return (new GeneralResource($request))->response()->setStatusCode(200);
    }
}
