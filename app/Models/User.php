<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'email',
        'password',
        'state_id',
        'user_type_id'
    ];

    public function user_types(){
        return $this->belongsTo(user_types::class, 'user_type_id');
    }

    public function states(){
        return $this->belongsTo(State::class, 'state_id');
    }

    public function data_user(){
        return $this->hasOne(data_users::class, 'id');
    }
}
