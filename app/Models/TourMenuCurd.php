<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourMenuCurd extends Model
{
    use HasFactory;

    protected $table = 'tour_menu_curd';

    protected $fillable = [
        'tour_menu_id',
        'title',
        'image',
        'content'
    ];
}
