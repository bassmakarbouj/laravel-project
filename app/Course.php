<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function myCategory(){
        return $this->belongTo(CategoryCourse::class);
    }
}
