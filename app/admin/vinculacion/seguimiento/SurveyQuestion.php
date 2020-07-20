<?php

namespace App\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\Survey;
use App\admin\vinculacion\seguimiento\QuestionOption;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function options()
    {
        return $this->hasMany(QuestionOption::class);
    }
}
