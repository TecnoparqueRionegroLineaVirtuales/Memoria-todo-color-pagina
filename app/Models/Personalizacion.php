<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personalizacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'artista_id',
        'mural_id',
        'producto_id',
        'descripcion',
        'datos_contacto'
    ];

    // Relación con el artista (usuario)
    public function artista()
    {
        return $this->belongsTo(User::class, 'artista_id');
    }

    // Relación con el mural (asumiendo que 'File' es el modelo para los murales)
    public function mural()
    {
        return $this->belongsTo(File::class, 'mural_id');
    }

    // Relación con el producto
    public function producto()
    {
        return $this->belongsTo(Product::class, 'producto_id');
    }
}
