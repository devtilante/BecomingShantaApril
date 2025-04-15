<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'place',
        'price',
        'inr_price',
        'euro_price',
        'day',
        'description',
        'short_desc',
        'tour_idea',
        'tour_type',
        'tour_theme',
        'tour_map'
    ];
}
