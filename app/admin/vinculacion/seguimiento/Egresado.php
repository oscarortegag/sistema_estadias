<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Egresado extends Model
{
		use SoftDeletes;
        protected $table="egresados";
        protected $primaryKey = "egresados_id";
        //protected $fillable = ['companyName','businessName','companyPhone'];
	    /**

	     * The attributes that should be mutated to dates.

	     *

	     * @var array

	     */
	    protected $dates = ['deleted_at'];

public function student()
{
    return $this->belongsTo(Student::class,'student_id', 'student_id');
}

 public function period()
 {
	return $this->belongsTo(Period::class, 'period_id', 'period_id');
 }

 public function surveys()
 {
	 return $this->hasMany(ApplySurvey::class,'egresados_id', 'egresados_id');
 }
}
