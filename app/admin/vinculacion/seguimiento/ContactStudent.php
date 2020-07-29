<?php

namespace App\admin\vinculacion\seguimiento;

use Illuminate\Database\Eloquent\Model;

class ContactStudent extends Model
{
    protected $fillable = [
        'student_id',
        'homePhone',
        'address',
        'state_id',
        'township',
        'zip_code',
        'kinship_id',
        'name_family',
        'homePhone_family',
        'cellPhone_family',
        'email_family',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }
}
