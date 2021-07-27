<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\ApplySurvey;
use App\admin\vinculacion\seguimiento\Enterprise;
use App\admin\vinculacion\seguimiento\Institution;
use App\admin\vinculacion\seguimiento\Period;
use App\admin\vinculacion\seguimiento\QuestionOption;
use App\admin\vinculacion\seguimiento\Student;
use App\admin\vinculacion\seguimiento\Survey;
use App\admin\vinculacion\seguimiento\SurveyQuestion;
use App\admin\vinculacion\seguimiento\ContactStudent;
use App\admin\vinculacion\seguimiento\SurveyResponse;
use App\Mail\EmailEncuesta;
use App\Mail\EmailSurveySend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            'period_id'     => $request->input('period_id'),
            'displayName'   => $request->input('displayName'),
            'description'   => $request->input('description'),
            'validation'    => $request->input('validation') ? '1' : '0',
            'tipo'          => $request->input('validation') ? '1' : '0',
        ]);

        \Session::flash('flash_message', '¡La encuesta fue creada exitosamente!');

        return redirect()->route('surveys.edit', ['id' => $survey->id]);
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
            'displayName'   => $request->input('displayName'),
            'description'   => $request->input('description'),
            'validation'    => $request->input('validation') ? '1' : '0',
            'tipo'          => $request->input('validation') ? '1' : '0',
        ]);

        if ($request['start_date'] and $request['end_date']) {
            $survey->update([
                'open' => '1',
                'start_date' => date("Y-m-d", strtotime($request['start_date'])),
                'end_date' => date("Y-m-d", strtotime($request['end_date'])),
            ]);
        }

        \Session::flash('flash_message', '¡La encuesta se actualizo exitosamente!');

        return redirect()->route('surveys.edit', ['id' => $survey->id]);
    }

    public function destroy($id)
    {
        $survey_eliminado = Survey::find($id);
        Survey::destroy($id);

        return response("La encuesta fue eliminada exitosamente");
    }

    function duplicate(Period $period)
    {
        $periods = Period::all();

        return view('admin.vinculacion.seguimiento.surveys.duplicate', compact('period', 'periods'));
    }

    function post_duplicate(Request $request)
    {

        $survey_previous = Survey::find($request['previous_survey_id']);

        $survey = Survey::create([
            'period_id' => $request->input('period_id'),
            'displayName' => $survey_previous->displayName,
            'description' => $survey_previous->description,
            'validation' => $survey_previous->validation,
            'tipo' => $survey_previous->tipo,
        ]);

        if ($survey_previous->questions->count() > 0) {
            foreach ($survey_previous->questions as $questions_previous) {

                $question = SurveyQuestion::create([
                    'survey_id' => $survey->id,
                    'type_question' => $questions_previous->type_question,
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

        \Session::flash('flash_message', '¡La encuesta se duplico exitosamente!');

        return redirect()->route('surveys.edit', ['id' => $survey->id]);
    }

    // por injección de dependencias obtienes el Cuestionario a aplicar
    // hay que cambiar el cuestionario o catalogarlo para reutilizar
    function apply_survey(Survey $survey)
    {
         $empresas = Enterprise::all();

        return view('admin.vinculacion.seguimiento.surveys.apply', compact('survey', 'empresas'));
    }

    function apply_survey_post(Request $request, $id)
    {

        $survey = Survey::find($id);

        // Validar el tipo
        if($survey->tipo)
            $empresas = $request['empresas'];
        else
            $alumnos = $request['alumnos'];

        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'subject' => 'required',
            'content' => 'required',
            'signature' => 'required'
        ]);

        $survey->update([
            'open' => '1',
            'start_date' => date("Y-m-d", strtotime($request['start_date'])),
            'end_date' => date("Y-m-d", strtotime($request['end_date'])),
        ]);

        $archivo = Storage::disk('firmas')->put('firmas', $request->file('signature'));

        if($survey->tipo){
            for ($i = 0; $i < count($empresas); $i++) {
                $empresa = Enterprise::find($empresas[$i]);
                $correo = $empresa['businessContactEmail'];

                $applySurvey = ApplySurvey::create([
                    'survey_id' => $survey->id,
                    'empresa_id' => $empresa->enterprise_id,
                ]);

                $data = [
                    'subject' => $request['subject'],
                    'content' => $request['content'],
                    'document' => asset($archivo),
                    'id' => $applySurvey->id,
                    'url' => route("surveys.answer", ['id' => $applySurvey->id]),
                ];
                Mail::to($correo)->send(new EmailSurveySend($data));
            }
        }else{
            for ($i = 0; $i < count($alumnos); $i++) {
                $student = Student::find($alumnos[$i]);
                $correo = $student['personalEmail'];

                $applySurvey = ApplySurvey::create([
                    'survey_id' => $survey->id,
                    'student_id' => $student->student_id,
                ]);

                $data = [
                    'subject' => $request['subject'],
                    'content' => $request['content'],
                    'document' => asset($archivo),
                    'id' => $applySurvey->id,
                    'url' => route("surveys.answer", ['id' => $applySurvey->id]),
                ];
                Mail::to($correo)->send(new EmailSurveySend($data));
            }
        }


        \Session::flash('flash_message', '¡La encuesta se aplico exitosamente!');

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
