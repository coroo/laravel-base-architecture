<?php

namespace App\Services\Account;

use App\Repositories\Account\UserEducationRepository;
use Auth;

class UserEducationService
{
    protected $errorText = 'Invalid request';
    protected $statusCode = '422';
    public $savedData;

    public function __construct()
    {
        $this->userEducationRepository = new UserEducationRepository();
    }

    public function all()
    {
        return $this->userEducationRepository->all();
    }

    public function show($id)
    {
        return $this->userEducationRepository->show($id);
    }

    public function add($request)
    {
        return $this->userEducationRepository->create($request->all());
    }

    public function update($request, $id)
    {
        return $this->userEducationRepository->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->userEducationRepository->delete($id);
    }
}
