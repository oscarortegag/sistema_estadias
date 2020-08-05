<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Period extends Model
{
    use SoftDeletes;
    protected $table="periods";    
    protected $primaryKey = 'period_id';

    protected $fillable = [
        'period_id',
        'name',
        'year',
        'firstDay',
        'lastDay',
    ];

    protected $dates = ['deleted_at'];    

    public function surveys()
    {
        return $this->hasMany(Survey::class, 'period_id', 'period_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'period_id', 'period_id');
    }

}
