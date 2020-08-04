<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modality extends Model
{
		use SoftDeletes;
        protected $table="modalities";
        protected $primaryKey = "modality_id";
        //protected $fillable = ['companyName','businessName','companyPhone'];
	    /**

	     * The attributes that should be mutated to dates.

	     *

	     * @var array

	     */
	    protected $dates = ['deleted_at'];
}
