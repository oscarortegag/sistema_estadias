<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;

class EducativeProgram extends Model
{
    protected $table="educativeprogram";

    protected $primaryKey = 'educativeProgram_id';

    public function students()
    {
        return $this->hasMany(Student::class, 'educativeProgram_id', 'educativeProgram_id');
    }
}
