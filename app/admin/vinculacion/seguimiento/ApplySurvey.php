<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;

class ApplySurvey extends Model
{
    protected $fillable = [
        'survey_id',
        'student_id',
        'empresa_id',
        'status',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    public function empresa()
    {
        return $this->belongsTo(Enterprise::class, 'empresa_id', 'enterprise_id');
    }


}
