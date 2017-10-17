<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'fullname',
        'email',
        'picture',
        'dob',
        'gender',
        'standard',
    ];

    protected $table = 'users';
}
