<?php

namespace App\Services\Account;

use App\Repositories\Account\UserFinancialRepository;
use Auth;

class UserFinancialService
{
    protected $errorText = 'Invalid request';
    protected $statusCode = '422';
    public $savedData;

    public function __construct()
    {
        $this->userFinancialRepository = new UserFinancialRepository();
    }
    
    public function all()
    {
        return $this->userFinancialRepository->all();
    }

    public function show($id, $field = 'id')
    {
        return $this->userFinancialRepository->show($id, $field);
    }

    public function add($request)
    {
        return $this->userFinancialRepository->create($request->all());
    }

    public function update($request, $id)
    {
        return $this->userFinancialRepository->update($request->all(), $id);
    }
}
