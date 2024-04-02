<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFile extends Model
{
    use HasFactory;
    
    public function files(){
        return $this->hasMany(File::class, 'id');
    }
}
