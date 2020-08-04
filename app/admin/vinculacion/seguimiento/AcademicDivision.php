<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicDivision extends Model
{
		use SoftDeletes;
        protected $table="academic_divisions";
        protected $primaryKey = "academicDivision_id";
	    /**

	     * The attributes that should be mutated to dates.

	     *

	     * @var array

	     */
	    protected $dates = ['deleted_at'];
}
