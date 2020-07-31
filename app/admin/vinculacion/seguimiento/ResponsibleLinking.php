<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResponsibleLinking extends Model
{
		use SoftDeletes;
        protected $table="responsible_linkings";
        protected $primaryKey = "responsibleLinking_id";
	    /**

	     * The attributes that should be mutated to dates.

	     *

	     * @var array

	     */
	    protected $dates = ['deleted_at']; 
}
