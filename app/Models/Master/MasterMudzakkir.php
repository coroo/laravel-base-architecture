<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class MasterMudzakkir extends Model
{
    protected $table = 'master_mudzakkirs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'kode_mudzakkir', 'nama_mudzakkir'
    ];
}
