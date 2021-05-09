<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class MasterAmaliyah extends Model
{
    protected $table = 'master_amaliyahs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'master_amaliyah'
    ];
}
