<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomizableProduct extends Model
{
    use HasFactory;

    protected $table = 'customizable_products';

    protected $fillable = [
        'name', 'descripcion', 'active'
    ];

    // Aquí puedes agregar relaciones, métodos personalizados, etc.
}
