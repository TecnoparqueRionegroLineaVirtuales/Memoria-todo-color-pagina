<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'email',
        'password',
        'state_id',
        'user_type_id'
    ];

    // Relación con tipos de usuario
    public function userType()
    {
        return $this->belongsTo(UserType::class, 'user_type_id');
    }

    // Relación con estados
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    // Relación con datos de usuario
    public function dataUser()
    {
        return $this->hasOne(DataUser::class, 'user_id');  // Asegúrate de que la clave foránea esté correcta
    }

    // Añadiendo la relación con los archivos, asumiendo que 'files' es el nombre de la tabla y `user_id` es la clave foránea
    public function files()
    {
        return $this->hasMany(File::class, 'user_id');
    }
}
