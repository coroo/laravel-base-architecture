<?php

namespace App\Services\Account;

use App\Repositories\Account\UserJobRepository;
use Auth;

class UserJobService
{
    protected $errorText = 'Invalid request';
    protected $statusCode = '422';
    public $savedData;

    public function __construct()
    {
        $this->userJobRepository = new UserJobRepository();
    }

    public function all()
    {
        return $this->userJobRepository->all();
    }

    public function show($id)
    {
        return $this->userJobRepository->show($id);
    }

    public function add($request)
    {
        return $this->userJobRepository->create($request->all());
    }

    public function update($request, $id)
    {
        return $this->userJobRepository->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->userJobRepository->delete($id);
    }
}
