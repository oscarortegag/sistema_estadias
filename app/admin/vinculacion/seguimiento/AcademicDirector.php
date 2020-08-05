<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicDirector extends Model
{
		use SoftDeletes;
        protected $table="academic_directors";
        protected $primaryKey = "academicDirector_id";
	    /**

	     * The attributes that should be mutated to dates.

	     *

	     * @var array

	     */
	    protected $dates = ['deleted_at'];

        public function division(){
			return $this->hasOne('App\admin\vinculacion\seguimiento\AcademicDivision','academicDivision_id','academicDivision_id');
        }

        public function gender(){
			return $this->hasOne(Gender::class,'gender_id','gender_id');
        }        	    
}
