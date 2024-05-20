<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'route', 'category_file_id', 'file_type_id', 'state_id'];

    public function fileType()
    {
        return $this->belongsTo(FileType::class, 'file_type_id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryFile::class, 'category_file_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

        // Relación con el usuario (artista)
        public function user()
        {
            return $this->belongsTo(User::class);
        }
}
