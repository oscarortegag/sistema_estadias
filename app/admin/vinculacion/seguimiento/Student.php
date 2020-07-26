<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = "student_id";

    public function period()
    {
        return $this->belongsTo(Period::class, 'period_id', 'period_id');
    }

    public function educativeProgram()
    {
        return $this->belongsTo(EducativeProgram::class, 'educativeProgram_id', 'educativeProgram_id');
    }

    public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'quarter_id', 'quarter_id');
    }

}
