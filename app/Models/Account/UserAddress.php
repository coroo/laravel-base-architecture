<?php

namespace App\Models\Account;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
