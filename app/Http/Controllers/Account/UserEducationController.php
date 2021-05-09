<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralResource;
use App\Services\Account\UserEducationService;
use Illuminate\Http\Request;

/**
 * @group Account
 *
 * API for managing account
 */
class UserEducationController extends Controller
{
    protected $statusCode = 200;

    public function __construct()
    {
        $this->userEducationService = new UserEducationService();
    }

    /**
     * Education Info.
     *
     * Education information of the user
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $userEducation = $this->userEducationService->all();
        return (new GeneralResource($userEducation))->response()->setStatusCode(200);
    }

    /**
     * Education Info.
     *
     * Education information of the user
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userEducation = $this->userEducationService->show($id);
        return (new GeneralResource($userEducation))->response()->setStatusCode(200);
    }

    public function add(Request $request)
    {
        $userEducation = $this->userEducationService->add($request);
        return (new GeneralResource($userEducation))->response()->setStatusCode(200);
    }

    public function update(Request $request, $id)
    {
        $userEducation = $this->userEducationService->update($request, $id);
        return (new GeneralResource($userEducation))->response()->setStatusCode(200);
    }

    public function delete($id)
    {
        $userEducation = $this->userEducationService->delete($id);
        return (new GeneralResource(['result' => true]))->response()->setStatusCode(200);
    }
}
