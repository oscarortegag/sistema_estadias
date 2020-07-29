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
            ->Join('educativeprogram as especialidad', 'l.educativeProgram_id', '=', 'especialidad.educativeProgram_id')
            ->select(DB::raw("CONCAT_WS(' ',lastName, motherLastNames, name) AS fullName, l.enrollment, especialidad.displayName as especialidad"))
            ->where('l.period_id', '=', $period->period_id)
            ->get();

        //dd($period);
        return view('admin.vinculacion.seguimiento.students.index', compact('period', 'students'));
    }

}
