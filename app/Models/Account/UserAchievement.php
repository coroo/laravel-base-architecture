<?php

namespace App\Models\Account;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserAchievement extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
