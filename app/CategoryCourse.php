<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryCourse extends Model
{
    protected $table = 'category_course';
    protected $fillable =[
        'name'
        ];
    public function courses(){
       return $this->hasMany(Course::class);
    }
}
