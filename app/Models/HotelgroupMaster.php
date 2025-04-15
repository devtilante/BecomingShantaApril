<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelgroupMaster extends Model
{
    use HasFactory;
    public $table = "hotel_group_master";
    public $timestamps = false;

    protected $fillable = [
        'title',
        'image',
        'content',
        'banner_image'
    ];
}
