<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function menuType(){
        return $this->belongsTo(MenuType::class, 'menu_type_id');
    }

    public function state(){
        return $this->belongsTo(State::class, 'state_id');
    }
}
