<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\Period;
use App\admin\vinculacion\seguimiento\QuestionOption;
use App\admin\vinculacion\seguimiento\Survey;
use App\admin\vinculacion\seguimiento\SurveyQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SurveyQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function create(Survey $survey)
    {
        return view('admin.vinculacion.seguimiento.questions.create', compact( 'survey'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'type_question' => 'required|integer',
            'name' => 'required|string',
            'content' => 'required|string',
        ]);


        $question = SurveyQuestion::create([
            'survey_id' => $request->input('survey_id'),
            'type_question' => $request->input('type_question'),
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'complement' => $request->input('complement'),
            'required' => $request->input('required')? '1' : '0',
        ]);

        \Session::flash('flash_message','¡La pregunta se creo exitosamente!');

        return redirect()->route('questions.edit', ['id'=>$question->id]);
    }

    public function edit(SurveyQuestion $question)
    {
        $survey = $question->survey;
        $period = $survey->period;

        return view('admin.vinculacion.seguimiento.questions.edit', compact('period', 'survey', 'question' ));
    }

    public function update(Request $request, $id)
    {
        $surveyQuestions = SurveyQuestion::find($id);

        $request->validate([
            'type_question' => 'required|integer',
            'name' => 'required|string',
            'content' => 'required|string',
        ]);

        $surveyQuestions->update([
            'type_question' => $request->input('type_question'),
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'complement' => $request->input('complement'),
            'required' => $request->input('required')? '1' : '0',
        ]);

        \Session::flash('flash_message','¡La pregunta se actualizo exitosamente!');

        return redirect()->route('questions.edit', [$surveyQuestions->id]);
    }

    public function destroy($id)
    {
        $surveyQuestions = SurveyQuestion::find($id);
        $survey_id = $surveyQuestions->survey_id;

        $surveyQuestions->delete();

        return response("La pregunta fue eliminada exitosamente");
    }

    public function duplicate($id)
    {
        $surveyQuestions_previous = SurveyQuestion::find($id);
        $survey_id = $surveyQuestions_previous->survey_id;

        $question = SurveyQuestion::create([
            'survey_id' => $surveyQuestions_previous->survey_id,
            'name' => $surveyQuestions_previous->name,
            'content' => $surveyQuestions_previous->content,
            'complement' => $surveyQuestions_previous->complement,
            'required' => $surveyQuestions_previous->required,
        ]);

        if ($surveyQuestions_previous->options->count() > 0) {
            foreach ($surveyQuestions_previous->options as $option_previous) {
                QuestionOption::create([
                    'survey_question_id' => $question->id,
                    'content' => $option_previous->content,
                ]);
            }
        }

        \Session::flash('flash_message','¡La pregunta se duplico exitosamente!');

        return redirect()->route('questions.edit', ['id'=>$question->id]);
    }
}
