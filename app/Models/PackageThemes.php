<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageThemes extends Model
{
    use HasFactory;
    public $table = "package_themes";
    public $timestamps = false;

    protected $fillable = [
        'package_id',
        'themes_id'

    ];
}
