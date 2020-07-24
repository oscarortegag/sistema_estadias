<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\QuestionOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class QuestionOptionController extends Controller
{

    public function store(Request $request)
    {
        $opcion = QuestionOption::create([
            'survey_question_id' => $request->input('survey_question_id'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('questions.edit', ['id'=>$opcion->survey_question_id]);
    }

    public function editModal($id)
    {
        $option = QuestionOption::find($id);

        return view('admin.vinculacion.seguimiento.options.editModal', compact('option'));
    }

    public function destroy($id)
    {
        $questionOptions = QuestionOption::find($id);
        $survey_question_id = $questionOptions->survey_question_id;

        $questionOptions->delete();

        return redirect()->route('questions.edit', [$survey_question_id]);
    }
}
