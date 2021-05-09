<?php

namespace App\Repositories\Account;

use App\Repositories\RepositoryInterface;
use App\Models\Account\UserJob;
use Auth;

class UserJobRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserJob();
    }

    public function all()
    {
        return $this->model->whereUserId(Auth::user()->id)->with('user')->get();
    }

    public function create(array $data)
    {
        $newUserJob = new UserJob();
        $newUserJob->user_id = request()->user()->id;
        $newUserJob->tahun_mulai = $data['tahun_mulai'];
        $newUserJob->tahun_selesai = $data['tahun_selesai'];
        $newUserJob->nama_pekerjaan = $data['nama_pekerjaan'];
        $newUserJob->nama_institusi = $data['nama_institusi'];
        $newUserJob->kota = $data['kota'];

        return $newUserJob->save() ? $newUserJob : false;
    }

    public function update(array $data, $id)
    {
        $updateUserJob = $this->model->latest()->find($id);
        if(isset($data['tahun_mulai'])){
            $updateUserJob->tahun_mulai = $data['tahun_mulai'];
            $updateUserJob->tahun_selesai = $data['tahun_selesai'];
            $updateUserJob->nama_pekerjaan = $data['nama_pekerjaan'];
            $updateUserJob->nama_institusi = $data['nama_institusi'];
            $updateUserJob->kota = $data['kota'];
        }

        return $updateUserJob->save() ? $updateUserJob : [];
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
