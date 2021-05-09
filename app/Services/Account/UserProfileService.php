<?php

namespace App\Services\Account;

use App\Repositories\Account\UserProfileRepository;
use Auth;

class UserProfileService
{
    protected $errorText = 'Invalid request';
    protected $statusCode = '422';
    public $savedData;

    public function __construct()
    {
        $this->userProfileRepository = new UserProfileRepository();
    }
    
    public function show($id, $field = 'id')
    {
        return $this->userProfileRepository->show($id, $field);
    }

    public function add($request)
    {
        return $this->userProfileRepository->create($request->all());
    }

    public function update($request, $id)
    {
        return $this->userProfileRepository->update($request->all(), $id);
    }
}
