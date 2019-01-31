<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormTemplate extends Model
{
    protected $fillable =[
        'student_name',
        'studing_year',
        'class',
        'category',
        'group',
        'facebook_link',
        'accepted',
        'email',
    ];
}
