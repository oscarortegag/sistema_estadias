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
}
