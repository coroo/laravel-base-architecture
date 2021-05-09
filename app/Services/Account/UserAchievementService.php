<?php

namespace App\Services\Account;

use App\Repositories\Account\UserAchievementRepository;
use Auth;

class UserAchievementService
{
    protected $errorText = 'Invalid request';
    protected $statusCode = '422';
    public $savedData;

    public function __construct()
    {
        $this->userAchievementRepository = new UserAchievementRepository();
    }

    public function all()
    {
        return $this->userAchievementRepository->all();
    }

    public function show($id)
    {
        return $this->userAchievementRepository->show($id);
    }

    public function add($request)
    {
        return $this->userAchievementRepository->create($request->all());
    }

    public function update($request, $id)
    {
        return $this->userAchievementRepository->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->userAchievementRepository->delete($id);
    }
}
