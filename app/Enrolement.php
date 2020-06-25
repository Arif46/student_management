<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrolement extends Model
{
    // public function student()
    // {
    //     return $this->belongsTo('App\Student');
    // }
    // public function course()
    // {
    //     return $this->belongsTo('App\Course');
    // }
    public function students(){
        return $this->hasMany('App\Student','student_id','student_id');
    }
}
