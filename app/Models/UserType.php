<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    // Especifica los campos que se pueden asignar masivamente.
    protected $fillable = ['description'];

    /**
     * Relación con User: asumiendo que cada UserType puede tener muchos User.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
