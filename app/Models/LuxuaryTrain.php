<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuxuaryTrain extends Model
{
    use HasFactory;
    public $table = "luxuary_train";
    public $timestamps = false;

    protected $fillable = [
        'image',
        'train_name'

    ];
}
