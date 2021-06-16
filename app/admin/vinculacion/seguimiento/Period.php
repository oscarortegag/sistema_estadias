<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function surveys(): HasMany
    {
        return $this->hasMany(Survey::class, 'period_id', 'period_id');
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'period_id', 'period_id');
    }
    // Relacionar los egresados del periodo
    public function egresados(): HasMany
    {
        return $this->hasMany(Egresado::class, 'period_id', 'period_id');
    }


    // Relación para obtener los alumnos que no hán Egresado
    public function students_no_egresados(): HasMany
    {
        return $this->hasMany(Student::class, 'period_id', 'period_id')
            ->whereDoesntHave('egreso');
    }

}
