<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    protected $fillable = [
        'apply_survey_id',
        'survey_question_id',
        'response_string',
        'reponse_date',
        'question_option_id',
    ];

    public function opcion()
    {
        return $this->belongsTo(QuestionOption::class);
    }

    public function pregunta()
    {
        return $this->belongsTo(SurveyQuestion::class);
    }

}
