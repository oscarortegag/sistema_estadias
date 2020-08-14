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

        \Session::flash('flash_message','¡La opción se agrego exitosamente!');

        return redirect()->route('questions.edit', ['id'=>$opcion->survey_question_id]);
    }

    public function editModal($id)
    {
        $option = QuestionOption::find($id);

        return view('admin.vinculacion.seguimiento.options.editModal', compact('option'));
    }

    public function update(Request $request, $id)
    {
        try{
            $option = QuestionOption::find($id);

            $option->update([
                'content' => $request->input('content'),
            ]);

            $ok = true;
        }
        catch(Exception $e){
            $ok = false;
            $msg = $e->getMessage();

        }

        \Session::flash('flash_message','¡La opción se actualizo exitosamente!');

        return response()->json(compact('ok', 'msg', 'option'));

    }

    public function destroy($id)
    {
        $questionOptions = QuestionOption::find($id);
        $survey_question_id = $questionOptions->survey_question_id;

        $questionOptions->delete();

        \Session::flash('flash_message','¡La opción se elimino exitosamente!');

        return redirect()->route('questions.edit', [$survey_question_id]);
    }
}
