<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicAdvisor extends Model
{
		use SoftDeletes;
        protected $table="academic_advisers";
        protected $primaryKey = "academicAdvisor_id";
	    /**

	     * The attributes that should be mutated to dates.

	     *

	     * @var array

	     */
	    protected $dates = ['deleted_at'];
}
