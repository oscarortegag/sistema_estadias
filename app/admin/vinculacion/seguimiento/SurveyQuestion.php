<?php

namespace App\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\Survey;
use App\admin\vinculacion\seguimiento\QuestionOption;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    protected $fillable = [
        'survey_id',
        'type_question',
        'name',
        'content',
        'complement',
        'required',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function options()
    {
        return $this->hasMany(QuestionOption::class);
    }
}
