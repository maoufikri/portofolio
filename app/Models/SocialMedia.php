<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SocialMedia extends Model
{
    use HasFactory;

    protected $table = 'social_medias';  // Tentukan nama tabel secara eksplisit jika tidak mengikuti konvensi plural
    protected $fillable = ['name', 'url', 'font_awesome_class'];
}
