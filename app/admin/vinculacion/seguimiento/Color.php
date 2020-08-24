<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
        'name',
        'code'
    ];


    public function educativeProgram()
    {
        return $this->hasOne(EducativeProgram::class);
    }
}
