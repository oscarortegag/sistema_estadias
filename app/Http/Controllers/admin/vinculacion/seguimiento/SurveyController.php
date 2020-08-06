<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\ApplySurvey;
use App\admin\vinculacion\seguimiento\Period;
use App\admin\vinculacion\seguimiento\QuestionOption;
use App\admin\vinculacion\seguimiento\Student;
use App\admin\vinculacion\seguimiento\Survey;
use App\admin\vinculacion\seguimiento\SurveyQuestion;
use App\admin\vinculacion\seguimiento\ContactStudent;
use App\admin\vinculacion\seguimiento\SurveyResponse;
use App\Mail\EmailEncuesta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SurveyController extends Controller
{
    function index(Period $period)
    {
        return view('admin.vinculacion.seguimiento.surveys.index', compact('period'));
    }

    function create(Period $period)
    {
        return view('admin.vinculacion.seguimiento.surveys.create', compact('period'));
    }

    public function store(Request $request)
    {

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

        return view('admin.vinculacion.seguimiento.surveys.edit', compact('survey'));
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

        if ($request['start_date'] AND $request['end_date']) {
            $survey->update([
                'open' => '1',
                'start_date' => date("Y-m-d", strtotime($request['start_date'])),
                'end_date' => date("Y-m-d", strtotime($request['end_date'])),
            ]);
        }

        return redirect()->route('surveys.edit', ['id'=>$survey->id]);
    }

    public function destroy($id)
    {
        $survey_eliminado = Survey::find($id);
        Survey::destroy($id);
        return redirect()->route('surveys.index', [$survey_eliminado->period_id]);
    }

    function duplicate(Period $period)
    {
        $periods = Period::all();

        return view('admin.vinculacion.seguimiento.surveys.duplicate', compact('period', 'periods'));
    }

    function post_duplicate(Request $request){

        $survey_previous = Survey::find($request['previous_survey_id']);

        $survey = Survey::create([
            'period_id' => $request->input('period_id'),
            'displayName' => $survey_previous->displayName,
            'description' => $survey_previous->description,
            'validation' => $survey_previous->validation,
        ]);

        if ($survey_previous->questions->count() > 0) {
            foreach ($survey_previous->questions as $questions_previous) {

                $question = SurveyQuestion::create([
                    'survey_id' => $survey->id,
                    'name' => $questions_previous->name,
                    'content' => $questions_previous->content,
                    'complement' => $questions_previous->complement,
                    'required' => $questions_previous->required,
                ]);

                if ($questions_previous->options->count() > 0) {
                    foreach ($questions_previous->options as $option_previous) {

                        QuestionOption::create([
                            'survey_question_id' => $question->id,
                            'content' => $option_previous->content,
                        ]);
                    }
                }
            }
        }

        return redirect()->route('surveys.index', [$request->input('period_id')]);

    }

    function apply_survey(Survey $survey)
    {
        //dd($survey);
        return view('admin.vinculacion.seguimiento.surveys.apply', compact('survey'));
    }

    function apply_survey_post (Request $request, $id){

        $alumnos = $request['alumnos'];
        $survey = Survey::find($id);

        $survey->update([
           'open' => '1',
           'start_date' => date("Y-m-d", strtotime($request['start_date'])),
           'end_date' => date("Y-m-d", strtotime($request['end_date'])),
        ]);

        $archivo = $request->file('signature')->store('public');



        for ($i=0; $i < count($alumnos); $i++ )
        {
            $student = Student::find($alumnos[$i]);
            $correo = $student['personalEmail'];


            $applySurvey = ApplySurvey::create([
                'survey_id' => $survey->id,
                'student_id' => $student->student_id,
            ]);

            $data = [
                'content' => $request['content'],
                'document' => $archivo,
                'id' => $applySurvey->id,
                'url' => route("surveys.answer", ['id'=>$applySurvey->id]),
            ];

            Mail::to($correo)->send(new EmailEncuesta($data));

        }

        return redirect()->route('surveys.index', [$survey->period_id]);
    }

    function activate($id)
    {
        $survey = Survey::find($id);

        $survey->update(['active' => '1']);

        return redirect()->route('surveys.index', [$survey->period_id]);
    }

    function deactivate($id)
    {
        $survey = Survey::find($id);

        $survey->update(['active' => '0']);

        return redirect()->route('surveys.index', [$survey->period_id]);
    }

}
