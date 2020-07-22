<?php

namespace App\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\SurveyQuestion;
use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    protected $fillable = [
        'survey_question_id',
        'content',
    ];
    public function question()
    {
        return $this->belongsTo(SurveyQuestion::class);
    }
}
