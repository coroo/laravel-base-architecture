<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class MasterBank extends Model
{
    protected $table = 'master_banks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'kode_bank', 'nama_bank'
    ];
}
