<?php

namespace App\Services\Account;

use App\Repositories\Account\UserFamilyRepository;
use Auth;

class UserFamilyService
{
    protected $errorText = 'Invalid request';
    protected $statusCode = '422';
    public $savedData;

    public function __construct()
    {
        $this->userFamilyRepository = new UserFamilyRepository();
    }

    public function all()
    {
        return $this->userFamilyRepository->all();
    }

    public function show($id)
    {
        return $this->userFamilyRepository->show($id);
    }

    public function add($request)
    {
        return $this->userFamilyRepository->create($request->all());
    }

    public function update($request, $id)
    {
        return $this->userFamilyRepository->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->userFamilyRepository->delete($id);
    }
}
