<?php

namespace App\Services\Account;

use App\Repositories\Account\LogNewUserUploaderRepository;
use Auth;

class LogNewUserUploaderService
{
    protected $errorText = 'Invalid request';
    protected $statusCode = '422';
    public $savedData;

    public function __construct()
    {
        $this->LogNewUserUploaderRepository = new LogNewUserUploaderRepository();
    }
    
    public function show($id, $field = 'id')
    {
        return $this->LogNewUserUploaderRepository->show($id, $field);
    }

    public function add($request)
    {
        return $this->LogNewUserUploaderRepository->create($request->all());
    }

    public function update($request, $id)
    {
        return $this->LogNewUserUploaderRepository->update($request->all(), $id);
    }
}
