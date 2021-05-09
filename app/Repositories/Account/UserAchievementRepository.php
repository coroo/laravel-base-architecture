<?php

namespace App\Repositories\Account;

use App\Repositories\RepositoryInterface;
use App\Models\Account\UserAchievement;
use Auth;

class UserAchievementRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserAchievement();
    }

    public function all()
    {
        return $this->model->whereUserId(Auth::user()->id)->with('user')->get();
    }

    public function create(array $data)
    {
        $newUserAchievement = new UserAchievement();
        $newUserAchievement->user_id = request()->user()->id;
        $newUserAchievement->tahun_achievement = $data['tahun_achievement'];
        $newUserAchievement->nama_achievement = $data['nama_achievement'];
        $newUserAchievement->keterangan_achievement = $data['keterangan_achievement'];

        return $newUserAchievement->save() ? $newUserAchievement : false;
    }

    public function update(array $data, $id)
    {
        $updateUserAchievement = $this->model->latest()->find($id);
        if(isset($data['nama_achievement'])){
            $updateUserAchievement->tahun_achievement = $data['tahun_achievement'];
            $updateUserAchievement->nama_achievement = $data['nama_achievement'];
            $updateUserAchievement->keterangan_achievement = $data['keterangan_achievement'];
        }

        return $updateUserAchievement->save() ? $updateUserAchievement : [];
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
