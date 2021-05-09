<?php

namespace App\Services\Master;

use App\Repositories\Master\MasterSyubahRepository;

class MasterSyubahService
{
    protected $errorText = 'Invalid request';
    protected $statusCode = '422';
    public $savedData;

    public function __construct()
    {
        $this->masterSyubahRepository = new MasterSyubahRepository();
    }

    public function all()
    {
        return $this->masterSyubahRepository->all();
    }

    public function show($id)
    {
        return $this->masterSyubahRepository->show($id);
    }

    public function add($request)
    {
        return $this->masterSyubahRepository->create($request->all());
    }

    public function update($request, $id)
    {
        return $this->masterSyubahRepository->update($request->all(), $id);
    }
}
