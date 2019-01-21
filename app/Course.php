<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Course extends Model
{
    public function myCategory(){
        return $this->belongTo(CategoryCourse::class);
    }

    // public function getTableColumns() {
    //     return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    // }

    public function getTableColumns() {
        return DB::select(
            DB::raw('SELECT * FROM `course`')
        );
    }
}
