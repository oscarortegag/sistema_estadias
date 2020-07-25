<?php

namespace App\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\SurveyQuestion;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'period_id',
        'displayName',
        'description',
        'validation',
    ];
    public function questions()
    {
       return $this->hasMany(SurveyQuestion::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class, 'period_id', 'period_id');
    }
}
