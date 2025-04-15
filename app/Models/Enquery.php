<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquery extends Model
{
    use HasFactory;
    public $table = "enquery";
    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'email',
        'mobile',
        'package_id',
        'msg',
        'send_date'
    ];
}
