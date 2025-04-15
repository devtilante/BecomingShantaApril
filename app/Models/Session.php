<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    public $table = "session_master";
    public $timestamps = false;

    protected $fillable = [
        'id',
        'session_name'
    ];
}
