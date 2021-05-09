<?php

namespace App\Repositories\Account;

use App\Repositories\RepositoryInterface;
use App\Models\Account\UserFamily;
use Auth;

class UserFamilyRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserFamily();
    }

    public function all()
    {
        return $this->model->whereUserId(Auth::user()->id)->with('user')->get();
    }

    public function create(array $data)
    {
        $newUserFamily = new UserFamily();
        $newUserFamily->user_id = request()->user()->id;
        $newUserFamily->nama = $data['nama'];
        $newUserFamily->kode_nas = $data['kode_nas'];
        $newUserFamily->tanggal_lahir = $data['tanggal_lahir'];
        $newUserFamily->hubungan = $data['hubungan'];
        $newUserFamily->taslim_futuh = $data['taslim_futuh'];
        $newUserFamily->sakanu_syubah = $data['sakanu_syubah'];

        return $newUserFamily->save() ? $newUserFamily : false;
    }

    public function update(array $data, $id)
    {
        $updateUserFamily = $this->model->latest()->find($id);
        if(isset($data['nama'])){
            $updateUserFamily->nama = $data['nama'];
            $updateUserFamily->kode_nas = $data['kode_nas'];
            $updateUserFamily->tanggal_lahir = $data['tanggal_lahir'];
            $updateUserFamily->hubungan = $data['hubungan'];
            $updateUserFamily->taslim_futuh = $data['taslim_futuh'];
            $updateUserFamily->sakanu_syubah = $data['sakanu_syubah'];
        }

        return $updateUserFamily->save() ? $updateUserFamily : [];
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
