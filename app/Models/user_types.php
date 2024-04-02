<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_types extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'description'
    ];
    
    public function users(){
        return $this->hasMany(User::class, 'id');
    }
}
