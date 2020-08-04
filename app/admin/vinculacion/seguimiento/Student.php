<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = "student_id";

    protected $fillable = [
        'cellPhone',
        'personalEmail',
        'facebook',
    ];

    public function document(){
        return $this->belongsTo('App\admin\vinculacion\seguimiento\OfficialDocument','student_id','student_id');
    }

    public function period()
    {
        return $this->belongsTo(Period::class, 'period_id', 'period_id');
    }

    public function program(){
        return $this->hasOne('App\admin\vinculacion\seguimiento\EducativeProgram','educativeProgram_id','educativeProgram_id');
    }

    public function educativeProgram()
    {
        return $this->belongsTo(EducativeProgram::class, 'educativeProgram_id', 'educativeProgram_id');
    }

    public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'quarter_id', 'quarter_id');
    }

    public function surveys()
    {
        return $this->hasMany(ApplySurvey::class,'student_id', 'student_id');
    }

    public function contact() {
        return $this->hasOne(ContactStudent::class, 'student_id', 'student_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
