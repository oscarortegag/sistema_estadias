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

    public function store(Request $request)
    {
        //dd($request);

        $request->validate([
            'displayName' => 'required|string|max:100',
            'description' => 'required|string'
        ]);


        $survey = Survey::create([
            'period_id' => $request->input('period_id'),
            'displayName' => $request->input('displayName'),
            'description' => $request->input('description'),
            'validation' => $request->input('validation')? '1' : '0',
        ]);

        return redirect()->route('surveys.edit', ['id'=>$survey->id]);
    }

    public function edit($id)
    {
        $survey = Survey::find($id);
        $period = Period::find($survey->period_id);

        return view('admin.vinculacion.seguimiento.surveys.edit', compact('survey', 'period'));
    }

    public function update(Request $request, $id)
    {
        $survey = Survey::find($id);

        $request->validate([
            'displayName' => 'required|string|max:100',
            'description' => 'required|string'
        ]);

        $survey->update([
            'displayName' => $request->input('displayName'),
            'description' => $request->input('description'),
            'validation' => $request->input('validation')? '1' : '0',
        ]);

        return redirect()->route('surveys.edit', ['id'=>$survey->id]);
    }
}
