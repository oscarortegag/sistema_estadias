<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeriodStay extends Model
{
		use SoftDeletes;
        protected $table="periods";
        protected $primaryKey = "period_id";
        //protected $fillable = ['companyName','businessName','companyPhone'];
	    /**

	     * The attributes that should be mutated to dates.

	     *

	     * @var array

	     */
	    protected $dates = ['deleted_at'];
}
