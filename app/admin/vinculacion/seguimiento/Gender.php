<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gender extends Model
{
	use SoftDeletes;
	protected $table ="genders";
	protected $primaryKey ="gender_id";
    /**

     * The attributes that should be mutated to dates.

     *

     * @var array

     */
    protected $dates = ['deleted_at'];

    public function students()
    {
        return $this->hasMany(Student::class, 'gender_id', 'gender_id');
    }
}
