<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralResource;
use App\Services\Account\UserAchievementService;
use Illuminate\Http\Request;

/**
 * @group Account
 *
 * API for managing account
 */
class UserAchievementController extends Controller
{
    protected $statusCode = 200;

    public function __construct()
    {
        $this->userAchievementService = new UserAchievementService();
    }

    /**
     * Achievement Info.
     *
     * Achievement information of the user
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $userAchievement = $this->userAchievementService->all();
        return (new GeneralResource($userAchievement))->response()->setStatusCode(200);
    }

    /**
     * Achievement Info.
     *
     * Achievement information of the user
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userAchievement = $this->userAchievementService->show($id);
        return (new GeneralResource($userAchievement))->response()->setStatusCode(200);
    }

    public function add(Request $request)
    {
        $userAchievement = $this->userAchievementService->add($request);
        return (new GeneralResource($userAchievement))->response()->setStatusCode(200);
    }

    public function update(Request $request, $id)
    {
        $userAchievement = $this->userAchievementService->update($request, $id);
        return (new GeneralResource($userAchievement))->response()->setStatusCode(200);
    }

    public function delete($id)
    {
        $userJob = $this->userAchievementService->delete($id);
        return (new GeneralResource(['result' => true]))->response()->setStatusCode(200);
    }
}
