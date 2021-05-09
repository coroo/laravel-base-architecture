<?php

namespace App\Repositories\Account;

use App\Repositories\RepositoryInterface;
use App\Models\Account\LogNewUserUploader;

class LogNewUserUploaderRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new LogNewUserUploader();
    }

    public function all()
    {
    }

    public function create(array $data)
    {
        // $newUserProfile = new User();
        // $newUserProfile->user_id = request()->user()->id;
        // $newUserProfile->kode_nas = $data['kode_nas'];

        // return $newUserProfile->save() ? $newUserProfile : false;
    }

    public function update(array $data, $id)
    {
        $updateUserProfile = $this->model->latest()->find($id);
        if(isset($data['status'])){
            $updateUserProfile->status = $data['status'];
        }
        if(isset($data['result_info'])){
            $updateUserProfile->result_info = $data['result_info'];
        }

        return $updateUserProfile->save() ? $updateUserProfile : [];
    }

    public function delete($id)
    {
    }

    public function show($id, $field = 'id')
    {
        return $model = ($field == 'id' || $field == false)
                ? $this->model->latest()->find($id)
                : $this->model->where($field, '=', $id)->latest()->first();
    }
}
