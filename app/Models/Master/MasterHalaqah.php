<?php

namespace App\Models\Master;

use App\User;
use Illuminate\Database\Eloquent\Model;

class MasterHalaqah extends Model
{
    protected $table = 'master_halaqahs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'kode_halaqah', 'nama_halaqah'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'master_halaqah_users');
    }
}
