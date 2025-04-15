<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public $table = "location_master";
    public $timestamps = false;

    protected $fillable = [
        'id',
        'type',
        'location_name',
        'location_code'
    ];
}
