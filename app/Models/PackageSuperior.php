<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageSuperior extends Model
{
    use HasFactory;
    public $table = "package_superior";
    public $timestamps = false;

    protected $fillable = [
        'package_id',
        'superior_city',
        'superior_hotel'

    ];
}
