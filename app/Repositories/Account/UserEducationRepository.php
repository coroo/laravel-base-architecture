<?php

namespace App\Repositories\Account;

use App\Repositories\RepositoryInterface;
use App\Models\Account\UserEducation;
use Auth;

class UserEducationRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserEducation();
    }

    public function all()
    {
        return $this->model->whereUserId(Auth::user()->id)->with('user')->get();
    }

    public function create(array $data)
    {
        $newUserEducation = new UserEducation();
        $newUserEducation->user_id = request()->user()->id;
        $newUserEducation->nama_lembaga = $data['nama_lembaga'];
        $newUserEducation->pendidikan = $data['pendidikan'];
        $newUserEducation->jurusan = $data['jurusan'];
        $newUserEducation->gelar_akademik = $data['gelar_akademik'];
        $newUserEducation->pendidikan_tamat = $data['pendidikan_tamat'];
        $newUserEducation->tamat_tahun = $data['tamat_tahun'];

        return $newUserEducation->save() ? $newUserEducation : false;
    }

    public function update(array $data, $id)
    {
        $updateUserEducation = $this->model->latest()->find($id);
        if(isset($data['nama_lembaga'])){
            $updateUserEducation->nama_lembaga = $data['nama_lembaga'];
            $updateUserEducation->pendidikan = $data['pendidikan'];
            $updateUserEducation->jurusan = $data['jurusan'];
            $updateUserEducation->gelar_akademik = $data['gelar_akademik'];
            $updateUserEducation->pendidikan_tamat = $data['pendidikan_tamat'];
            $updateUserEducation->tamat_tahun = $data['tamat_tahun'];
        }

        return $updateUserEducation->save() ? $updateUserEducation : [];
    }

    public function delete($id)
    {
        $data = $this->model->whereUserId(request()->user()->id)->find($id);
        return $data->delete();
    }

    public function show($id, $field = 'id')
    {
        return $model = ($field == 'id' || $field == false)
                ? $this->model->with('user')->latest()->find($id)
                : $this->model->with('user')->where($field, '=', $id)->latest()->firstOrFail();
    }
}
