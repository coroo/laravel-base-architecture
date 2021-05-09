<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralResource;
use App\Services\Account\UserFamilyService;
use Illuminate\Http\Request;

/**
 * @group Account
 *
 * API for managing account
 */
class UserFamilyController extends Controller
{
    protected $statusCode = 200;

    public function __construct()
    {
        $this->userFamilyService = new UserFamilyService();
    }

    /**
     * Family Info.
     *
     * Family information of the user
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $family = $this->userFamilyService->all();
        return (new GeneralResource($family))->response()->setStatusCode(200);
    }

    /**
     * Family Info.
     *
     * Family information of the user
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $family = $this->userFamilyService->show($id);
        return (new GeneralResource($family))->response()->setStatusCode(200);
    }

    public function add(Request $request)
    {
        $userFamily = $this->userFamilyService->add($request);
        return (new GeneralResource($userFamily))->response()->setStatusCode(200);
    }

    public function update(Request $request, $id)
    {
        $userFamily = $this->userFamilyService->update($request, $id);
        return (new GeneralResource($userFamily))->response()->setStatusCode(200);
    }

    public function delete($id)
    {
        $userFamily = $this->userFamilyService->delete($id);
        return (new GeneralResource(['result' => true]))->response()->setStatusCode(200);
    }
}
