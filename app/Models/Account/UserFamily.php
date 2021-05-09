<?php

namespace App\Models\Account;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserFamily extends Model
{
    protected $casts = [
        'tanggal_lahir' => 'date:Y-m-d'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
