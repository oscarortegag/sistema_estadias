<?php

namespace App\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\SurveyQuestion;
use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{

    public function question()
    {
        return $this->belongsTo(SurveyQuestion::class);
    }
}
