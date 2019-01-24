<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $table='course';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',

    ];

    protected $fillable =['name',
        'category_id',
        'time' ,
        'period',
        'target_age',
        'student_number' ,
        'lessons_number',
        'trainer_name',
        'start_date',
        'end_date' ,
        ];



    public function myCategory(){
        return $this->belongTo(CategoryCourse::class);
    }

    // public function getTableColumns() {
    //     return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    // }
}
