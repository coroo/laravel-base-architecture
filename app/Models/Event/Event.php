<?php

namespace App\Models\Event;

use App\Models\Master\MasterAmaliyah;
use App\Models\Master\MasterHalaqah;
use App\Models\Master\MasterHijriyah;
use App\Models\Master\MasterMudzakkir;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Silvanite\Brandenburg\Traits\HasRoles;

class Event extends Model
{   
    use HasRoles;
    protected $connection = 'mysql';
    protected $table = 'events';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_acara' => 'date:Y-m-d'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->user_id = auth()->user()->id;
        });
    }

    public function tahunAmaliyah()
    {
        return $this->belongsTo(MasterAmaliyah::class);
    }

    public function bulanHijriyah()
    {
        return $this->belongsTo(MasterHijriyah::class);
    }

    public function halaqah()
    {
        return $this->belongsTo(MasterHalaqah::class, 'kode_halaqah', 'kode_halaqah');
    }

    public function mudzakkir()
    {
        return $this->belongsTo(MasterMudzakkir::class, 'kode_mudzakkir', 'kode_mudzakkir');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function participant()
    {
        return $this->belongsToMany(User::class, 'event_non_thausiyah_users');
    }
}
