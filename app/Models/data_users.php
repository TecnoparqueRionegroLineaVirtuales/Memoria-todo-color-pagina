<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_users extends Model
{
    use HasFactory;
    protected $fillable = [
            'name',
            'last_name',
            'gender',
            'phone',
            'biography',
            'user_id',
            'file'
    ];
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
