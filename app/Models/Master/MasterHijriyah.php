<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class MasterHijriyah extends Model
{
    protected $table = 'master_hijriyahs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'master_hijriyah'
    ];
}
