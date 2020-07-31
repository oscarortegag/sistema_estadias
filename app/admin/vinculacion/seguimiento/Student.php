<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
        protected $table="students";
        protected $primaryKey = "student_id";

        public function document(){
        	return $this->belongsTo('App\admin\vinculacion\seguimiento\OfficialDocument','student_id','student_id');
        }

        public function period(){
        	return $this->hasOne('App\admin\vinculacion\seguimiento\PeriodStay','period_id','period_id');
        }

        public function program(){
        	return $this->hasOne('App\admin\vinculacion\seguimiento\EducativeProgram','educativeProgram_id','educativeProgram_id');
        }
}
