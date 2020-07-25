<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $primaryKey = 'period_id';

    protected $fillable = [
        'period_id',
        'name',
        'firstDay',
        'lastDay',
    ];

    public function surveys()
    {
        return $this->hasMany(Survey::class, 'period_id', 'period_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'period_id', 'period_id');
    }

}
