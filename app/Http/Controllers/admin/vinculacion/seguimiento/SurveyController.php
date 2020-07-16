<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\Period;
use App\admin\vinculacion\seguimiento\Survey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    function index(Period $period)
    {
        $surveys = DB::table('surveys as l')
            ->select(DB::raw("id,displayName, description"))
            ->where('l.period_id', '=', $period->id)
            ->get();

        return view('admin.vinculacion.seguimiento.surveys.index', compact('period', 'surveys'));
    }

    function create(Period $period)
    {

        return view('admin.vinculacion.seguimiento.surveys.create', compact('period'));
    }

    public function edit($id)
    {
        $survey = Survey::find($id);
        $period = Period::find($survey->period_id);

        return view('admin.vinculacion.seguimiento.surveys.edit', compact('survey', 'period'));
    }
}
