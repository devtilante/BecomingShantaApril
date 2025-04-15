<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageFestival extends Model
{
    use HasFactory;
    public $table = "package_festival";
    public $timestamps = false;

    protected $fillable = [
        'package_id',
        'festival_id'

    ];
}
