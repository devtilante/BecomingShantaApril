<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FestivalMaster extends Model
{
    use HasFactory;
    public $table = "festival_master";
    public $timestamps = false;

    protected $fillable = [
        'title',
        'image',
        'content',
		'short_description',
        'banner_image'
    ];
}
