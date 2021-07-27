<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enterprise extends Model
{
		use SoftDeletes;
        protected $table="enterprises";
        protected $primaryKey = "enterprise_id";
        //protected $fillable = ['companyName','businessName','companyPhone'];
	    /**

	     * The attributes that should be mutated to dates.

	     *

	     * @var array

	     */
	    protected $dates = ['deleted_at'];

    public function surveys()
    {
        return $this->hasMany(ApplySurvey::class,'empresa_id', 'enterprise_id');
    }
}
