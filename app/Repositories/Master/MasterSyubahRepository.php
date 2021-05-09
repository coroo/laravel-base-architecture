<?php

namespace App\Repositories\Master;

use App\Repositories\RepositoryInterface;
use App\Models\Master\MasterSyubah;

class MasterSyubahRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new MasterSyubah();
    }

    public function all()
    {
        return $this->model->get();
    }

    public function create(array $data)
    {
        $newMasterSyubah = new MasterSyubah();
        $newMasterSyubah->user_id = request()->user()->id;
        $newMasterSyubah->kode_syubah = $data['kode_syubah'];
        $newMasterSyubah->nama_syubah = $data['nama_syubah'];

        return $newMasterSyubah->save() ? $newMasterSyubah : false;
    }

    public function update(array $data, $id)
    {
        $updateMasterSyubah = $this->model->latest()->find($id);
        if(isset($data['nama_syubah'])){
            $updateMasterSyubah->kode_syubah = $data['kode_syubah'];
            $updateMasterSyubah->nama_syubah = $data['nama_syubah'];
        }

        return $updateMasterSyubah->save() ? $updateMasterSyubah : [];
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
