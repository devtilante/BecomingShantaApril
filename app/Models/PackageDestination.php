<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageDestination extends Model
{
    use HasFactory;
    public $table = "package_destination";
    public $timestamps = false;

    protected $fillable = [
        'package_id',
        'destination_id'

    ];
}
