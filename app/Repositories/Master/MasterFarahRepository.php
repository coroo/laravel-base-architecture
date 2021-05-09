<?php

namespace App\Repositories\Master;

use App\Repositories\RepositoryInterface;
use App\Models\Master\MasterFarah;

class MasterFarahRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new MasterFarah();
    }

    public function all()
    {
        return $this->model->get();
    }

    public function create(array $data)
    {
        $newMasterFarah = new MasterFarah();
        $newMasterFarah->user_id = request()->user()->id;
        $newMasterFarah->kode_farah = $data['kode_farah'];
        $newMasterFarah->nama_farah = $data['nama_farah'];

        return $newMasterFarah->save() ? $newMasterFarah : false;
    }

    public function update(array $data, $id)
    {
        $updateMasterFarah = $this->model->latest()->find($id);
        if(isset($data['nama_farah'])){
            $updateMasterFarah->kode_farah = $data['kode_farah'];
            $updateMasterFarah->nama_farah = $data['nama_farah'];
        }

        return $updateMasterFarah->save() ? $updateMasterFarah : [];
    }

    public function delete($id)
    {
    }

    public function show($id, $field = 'id')
    {
        return $model = ($field == 'id' || $field == false)
                ? $this->model->latest()->find($id)
                : $this->model->where($field, '=', $id)->latest()->firstOrFail();
    }
}
