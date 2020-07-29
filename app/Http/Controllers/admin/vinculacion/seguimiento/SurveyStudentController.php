<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\ApplySurvey;
use App\admin\vinculacion\seguimiento\ContactStudent;
use App\admin\vinculacion\seguimiento\Student;
use App\admin\vinculacion\seguimiento\Survey;
use App\admin\vinculacion\seguimiento\SurveyResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurveyStudentController extends Controller
{
    function answer_survey(ApplySurvey $applySurvey)
    {

        if(!$applySurvey->student->contact){
            $contactStudent = ContactStudent::create([
                'student_id' => $applySurvey->student_id,
            ]);
        }

        //dd($contactStudent);
        return view('admin.vinculacion.seguimiento.surveyStudent.answer', compact('applySurvey'));
    }

    function answer_survey_post (Request $request, $id)
    {
        $applySurvey = ApplySurvey::find($id);
        $student = Student::find($applySurvey->student_id);
        $survey = Survey::find($applySurvey->survey_id);
        $contactStudent = $student->contact;

        if ($survey->validation == 1) {
            $contactStudent->update([
                    'homePhone' => $request['homePhone'],
                    'address' => $request['address'],
                    'state_id' => $request['state_id'],
                    'township' => $request['township'],
                    'zip_code' => $request['zip_code'],
                    'kinship_id' => $request['kinship_id'],
                    'name_family' => $request['name_family'],
                    'homePhone_family' => $request['homePhone_family'],
                    'cellPhone_family' => $request['cellPhone_family'],
                    'email_family' => $request['email_family'],
                ]);

            $student->update([
                'cellPhone' => $request['cellPhone'],
                'personalEmail' => $request['personalEmail'],
                'facebook' => $request['facebook'],
            ]);
        }

        foreach ($survey->questions as $question) {
            if ($question->type_question == 1){
                $pregunta = 'pregunta' . $question->id;
                $surveyResponse = SurveyResponse::create([
                    'survey_question_id' => $question->id,
                    'question_option_id' => $request[$pregunta],
                ]);
            } elseif ($question->type_question == 2){
                $pregunta = 'pregunta' . $question->id;
                $opciones =  $request[$pregunta];
                for($i=0; $i<count($opciones); $i++){
                    $surveyResponse = SurveyResponse::create([
                        'survey_question_id' => $question->id,
                        'question_option_id' => $opciones[$i],
                    ]);


                }
            } else if ($question->type_question == 3){
                $pregunta = 'pregunta' . $question->id;
                $surveyResponse = SurveyResponse::create([
                    'survey_question_id' => $question->id,
                    'response_string' => $request[$pregunta],
                ]);

            }
            else if ($question->type_question == 4){
                $pregunta = 'pregunta' . $question->id;
                $surveyResponse = SurveyResponse::create([
                    'survey_question_id' => $question->id,
                    'response_string' => date("Y-m-d", strtotime($request[$pregunta])),
                ]);

            }

        }

        $applySurvey->update(['status' => '1']);

    }

}
