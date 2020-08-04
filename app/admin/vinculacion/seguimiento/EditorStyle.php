<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EditorStyle extends Model
{
		use SoftDeletes;
        protected $table="editorial_stylies";
        protected $primaryKey = "editorialAdvisor_id";
	    /**

	     * The attributes that should be mutated to dates.

	     *

	     * @var array

	     */
	    protected $dates = ['deleted_at']; 
}
