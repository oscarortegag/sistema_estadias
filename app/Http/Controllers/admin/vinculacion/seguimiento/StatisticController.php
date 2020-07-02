<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\Period;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    function index(Period $period)
    {
        $surveys = DB::table('surveys')
            ->select(DB::raw("count(*) as total"))
            ->where('period_id', '=', $period->id)
            ->get();

        $students = DB::table('students')
            ->select(DB::raw("count(*) as total"))
            ->where('period_id', '=', $period->id)
            ->get();

        //dd($polls[0]->total);
        //dd($students[0]->total);

        return view('admin.vinculacion.seguimiento.statistics.index', compact('period', 'surveys', 'students'));
    }
}
