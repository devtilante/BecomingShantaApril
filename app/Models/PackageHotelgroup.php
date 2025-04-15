<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageHotelgroup extends Model
{
    use HasFactory;
    public $table = "package_hotelgroup";
    public $timestamps = false;

    protected $fillable = [
        'package_id',
        'hotelgroup_id'

    ];
}
