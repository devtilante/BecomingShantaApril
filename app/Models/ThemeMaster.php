<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeMaster extends Model
{
    use HasFactory;
    public $table = "theme_master";
    public $timestamps = false;

    protected $fillable = [
        'title',
        'image',
        'content',
        'banner_image'
    ];
}
