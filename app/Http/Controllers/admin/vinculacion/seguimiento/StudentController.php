<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\Period;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    function index(Period $period)
    {
        $students = DB::table('students as l')
            ->Join('sut.educative_programs as especialidad', 'l.educative_program_id', '=', 'especialidad.id')
            ->select(DB::raw("CONCAT_WS(' ',primerApellido, segundoApellido, name) AS fullName, l.id, l.enrollment, l.primerApellido, l.segundoApellido, l.name, especialidad.displayName as especialidad"))
            ->where('l.period_id', '=', $period->period_id)
            ->get();

        //dd($period);
        return view('admin.vinculacion.seguimiento.students.index', compact('period', 'students'));
    }

}
