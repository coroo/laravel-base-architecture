<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralResource;
use App\Services\Account\UserJobService;
use Illuminate\Http\Request;

/**
 * @group Account
 *
 * API for managing account
 */
class UserJobController extends Controller
{
    protected $statusCode = 200;

    public function __construct()
    {
        $this->userJobService = new UserJobService();
    }

    /**
     * Job Info.
     *
     * Job information of the user
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $userJob = $this->userJobService->all();
        return (new GeneralResource($userJob))->response()->setStatusCode(200);
    }

    /**
     * Job Info.
     *
     * Job information of the user
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userJob = $this->userJobService->show($id);
        return (new GeneralResource($userJob))->response()->setStatusCode(200);
    }

    public function add(Request $request)
    {
        $userJob = $this->userJobService->add($request);
        return (new GeneralResource($userJob))->response()->setStatusCode(200);
    }

    public function update(Request $request, $id)
    {
        $userJob = $this->userJobService->update($request, $id);
        return (new GeneralResource($userJob))->response()->setStatusCode(200);
    }

    public function delete($id)
    {
        $userJob = $this->userJobService->delete($id);
        return (new GeneralResource(['result' => true]))->response()->setStatusCode(200);
    }
}
