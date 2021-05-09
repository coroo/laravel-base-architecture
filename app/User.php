<?php

namespace App;

use App\Models\Account\UserAchievement;
use App\Models\Account\UserEducation;
use App\Models\Account\UserFamily;
use App\Models\Account\UserJob;
use App\Models\Master\MasterFarah;
use App\Models\Master\MasterSyubah;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Silvanite\Brandenburg\Traits\HasRoles;
// These two come from Media Library
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class User extends Authenticatable implements HasMedia
{
    use HasRoles, HasApiTokens, Notifiable, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'username', 'password', 'user_type', 'access_token', 'nama_aslu', 'nama_hijrah', 'syubah', 'farah', 'username', 'password', 'email', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'status_keumatan', 'golongan_darah', 'status_kawin', 'ayah_kode_nas', 'ayah_nama_hijrah', 'ibu_kode_nas', 'ibu_nama_hijrah', 'wali_kode_nas', 'wali_nama_hijrah', 'alamat', 'kelurahan', 'kecamatan', 'kabupaten', 'provinsi', 'kode_pos', 'no_telepon', 'whatsapp', 'pin_bb', 'nama_akun_fb', 'entrance_channel', 'entrance_desc'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_lahir' => 'date'
    ];
    
    /**
     * Find the user instance for the given username.
     *
     * @param  string  $username
     * @return \App\User
     */
    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    }
    
    public function userJobs()
    {
        return $this->hasMany(UserJob::class);
    }

    public function userFamilies()
    {
        return $this->hasMany(UserFamily::class);
    }

    public function userAchievements()
    {
        return $this->hasMany(UserAchievement::class);
    }

    public function userEducations()
    {
        return $this->hasMany(UserEducation::class);
    }

    public function masterSyubah()
    {
        return $this->belongsTo(MasterSyubah::class, 'syubah', 'kode_syubah');
    }

    public function masterFarah()
    {
        return $this->belongsTo(MasterFarah::class, 'farah', 'kode_farah');
    }

}
