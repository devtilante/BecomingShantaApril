<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageDeluxe extends Model
{
    use HasFactory;
    public $table = "package_deluxe";
    public $timestamps = false;

    protected $fillable = [
        'package_id',
        'deluxe_city',
        'deluxe_hotel'
    ];
}
