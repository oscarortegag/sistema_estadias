<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;

class Quarter extends Model
{
    protected $table="quarters";

    protected $primaryKey = 'quarter_id';

    public function students()
    {
        return $this->hasMany(Student::class, 'quarter_id', 'quarter_id');
    }
}
