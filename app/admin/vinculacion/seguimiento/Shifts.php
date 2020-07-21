<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shifts extends Model
{
		use SoftDeletes;
		protected $table ="shifts";
		protected $primaryKey ="shift_id";
	    /**

	     * The attributes that should be mutated to dates.

	     *

	     * @var array

	     */
	    protected $dates = ['deleted_at']; 		
}
