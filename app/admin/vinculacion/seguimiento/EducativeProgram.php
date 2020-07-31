<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducativeProgram extends Model
{
    use SoftDeletes;

    protected $table="educativeprogram";

    protected $primaryKey = 'educativeProgram_id';

    protected $dates = ['deleted_at'];

    public function students()
    {
        return $this->hasMany(Student::class, 'educativeProgram_id', 'educativeProgram_id');
    }
}
