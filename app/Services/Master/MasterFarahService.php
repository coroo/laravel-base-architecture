<?php

namespace App\Services\Master;

use App\Repositories\Master\MasterFarahRepository;

class MasterFarahService
{
    protected $errorText = 'Invalid request';
    protected $statusCode = '422';
    public $savedData;

    public function __construct()
    {
        $this->masterFarahRepository = new MasterFarahRepository();
    }

    public function all()
    {
        return $this->masterFarahRepository->all();
    }

    public function show($id)
    {
        return $this->masterFarahRepository->show($id);
    }

    public function add($request)
    {
        return $this->masterFarahRepository->create($request->all());
    }

    public function update($request, $id)
    {
        return $this->masterFarahRepository->update($request->all(), $id);
    }
}
