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

    public function institution(){
        return $this->hasOne(Institution::class,'institution_id','institution_id');
    }

    public function gender(){
        return $this->belongsTo(Gender::class,'gender_id','gender_id');
    }

    public function group(){
        return $this->hasOne(Group::class,'group_id','group_id');
    }

    public function shift(){
        return $this->hasOne(Shifts::class,'shift_id','shift_id');
    }

    public function degree(){
        return $this->hasOne(Degree::class,'degree_id','degree_id');
    }

    // Relación para obtener el registro de egreso
    public function egreso()
    {
        return $this->belongsTo(Egresado::class,'student_id','student_id');
    }
}
