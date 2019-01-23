<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryCourse extends Model
{
    protected $table = 'category_course';
    public function courses(){
       return $this->hasMany(Course::class);
    }
}
