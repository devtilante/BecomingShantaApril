<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sloat extends Model
{
    use HasFactory;
    public $table = "sloat_master";
    public $timestamps = false;

    protected $fillable = [
        'id',
        'sloat_name'
    ];
}
