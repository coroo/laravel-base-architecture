<?php

namespace App\Models\Master;

use App\User;
use Illuminate\Database\Eloquent\Model;

class MasterSyubah extends Model
{
    protected $table = 'master_syubah';

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
