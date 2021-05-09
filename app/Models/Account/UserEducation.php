<?php

namespace App\Models\Account;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{   
    protected $connection = 'mysql';
    protected $table = 'user_educations';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
