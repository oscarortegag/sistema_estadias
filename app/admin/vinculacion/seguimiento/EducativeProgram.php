<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducativeProgram extends Model
{
    use SoftDeletes;

    protected $table="educative_programs";

    protected $primaryKey = 'educativeProgram_id';

    protected $dates = ['deleted_at'];

    public function students()
    {
        return $this->hasMany(Student::class, 'educativeProgram_id', 'educativeProgram_id');
    }

    public function color() {
        return $this->belongsTo(Color::class);
    }
}
