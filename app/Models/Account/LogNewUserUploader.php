<?php

namespace App\Models\Account;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Silvanite\Brandenburg\Traits\HasRoles;

class LogNewUserUploader extends Model
{
    use HasRoles;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->user_id = auth()->user()->id;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
