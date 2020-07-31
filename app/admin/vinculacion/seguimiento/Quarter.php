<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quarter extends Model
{
    use SoftDeletes;

    protected $table="quarters";

    protected $primaryKey = 'quarter_id';

    protected $dates = ['deleted_at'];
    public function students()
    {
        return $this->hasMany(Student::class, 'quarter_id', 'quarter_id');
    }
}
