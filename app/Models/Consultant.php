<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    use HasFactory;
    public $table = "consultants";
    public $timestamps = false;

    protected $fillable = [
        'id',
        'category_ids',
        'subcategory_ids',
        'sub_sub_category_ids',
        'name',
        'about_me',
        'email',
        'phone',
        'designation',
        'photo',
        'experience',
        'number_of_organization',
        'number_of_client',
        'password',
        'type_of_service',
'linkedin_username',
'instagram_username',
'whatsapp_phone',
'specialization',
'engaging_platforms',
'education_qualification',
'certification',
'past_organization',
'describe_ideal_client',

    ];
}
