<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public $table = "blogs";
    public $timestamps = false;

    protected $fillable = [
        'category_id',
        'blog_title',
        'blog_content',
        'blog_image',
        'tags',
        'blog_date'

    ];
}

