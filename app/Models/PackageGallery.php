<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageGallery extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'package_id',
        'image_file'
    ];
}
