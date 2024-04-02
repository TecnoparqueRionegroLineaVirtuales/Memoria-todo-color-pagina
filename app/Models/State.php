<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public function files(){
        return $this->hasMany(File::class, 'id');
    }

    public function products(){
        return $this->hasMany(Product::class, 'id');
    }

    public function menus(){
        return $this->hasMany(Menu::class, 'id');
    }

    public function artilces(){
        return $this->hasMany(Article::class, 'id');
    }

    public function users(){
        return $this->hasMany(User::class, 'id');
    }
}
