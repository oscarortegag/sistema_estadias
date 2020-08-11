<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function educativeProgram()
    {
        return $this->hasOne(EducativeProgram::class);
    }
}
