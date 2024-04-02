<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    public function states(){
        return $this->belongsTo(State::class, 'state_id');
    }

    public function files(){
        return $this->belongsTo(File::class, 'file_id');
    }

    public function categories(){
        return $this->belongsTo(CategoryProduct::class, 'category_product_id');
    }

}
