<?php

namespace App\Models\Financial;

use App\Models\Master\MasterBank;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Silvanite\Brandenburg\Traits\HasRoles;

class Financial extends Model
{   
    use HasRoles;
    protected $connection = 'mysql';
    protected $table = 'financials';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_finansial' => 'date:Y-m-d'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->approval_id = auth()->user()->id;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approval()
    {
        return $this->belongsTo(User::class, 'approval_id');
    }

    public function bank()
    {
        return $this->belongsTo(MasterBank::class, 'bank_code');
    }

    public function financialTypeAlocationInput()
    {
        return $this->hasOne(FinancialTypeAlocationInput::class, 'kode_finansial_alokasi_input', 'financial_tipe_alokasi_pendanaan');
    }

    public function financialTypeAlocationOutput()
    {
        return $this->hasOne(FinancialTypeAlocationOutput::class, 'kode_finansial_alokasi_output', 'financial_tipe_alokasi_pengeluaran');
    }
}
