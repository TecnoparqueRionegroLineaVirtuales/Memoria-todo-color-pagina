<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'route', 'category_file_id', 'file_type_id', 'state_id'];

    public function fileTypes(){
        return $this->belongsTo(FileType::class, 'file_type_id');
    }

    public function categories(){
        return $this->belongsTo(CategoryFile::class, 'category_file_id');
    }

    public function states(){
        return $this->belongsTo(State::class, 'state_id');
    }
}
