<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'link',
        'social_type_id',
        'user_id',
];

    public function socialType(){
        return $this->belongsTo(SocialType::class, 'social_type_id');
    }

    public function user(){
        return $this->belongsTo(File::class, 'user_id');
    }
}
