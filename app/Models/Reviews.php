<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    public $table = "reviews";
    public $timestamps = false;

    protected $fillable = [
        'package_id',
        'full_name',
        'email',
        'message',
        'review_date'
    ];
}
