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
        'customizable_product_id',
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

    // Relación con el producto (Actualizada para reflejar el cambio de 'producto_id' a 'customizable_product_id')
    public function producto()
    {
        return $this->belongsTo(CustomizableProduct::class, 'customizable_product_id'); // Asegúrate de que la clase referenciada sea correcta
    }
}
