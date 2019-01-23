<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table='course';

    protected $guarded = [
//        'id'
    ];

//    protected $fillable = [
//        'name',
//        ''
//    ];

    public function myCategory(){
        return $this->belongTo(CategoryCourse::class);
    }

    // public function getTableColumns() {
    //     return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    // }
}
