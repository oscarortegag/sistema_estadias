<?php

namespace App\Exports;

use App\admin\vinculacion\seguimiento\Enterprise;
use App\admin\vinculacion\seguimiento\Student;
use App\admin\vinculacion\seguimiento\Survey;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class SurveysExport implements FromView
{
    private $survey_id;

    public function __construct($id)
    {
        $this->survey_id = $id;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $survey = Survey::find($this->survey_id);
        $respuestas = array();
        // Validar tipo de encuesta

        // Empresas
        if ($survey->tipo == 1) {

            $empresas = Enterprise::join('apply_surveys', 'apply_surveys.empresa_id', 'enterprise_id')
                ->where('apply_surveys.survey_id', $survey->id)
                ->get();

            $responses = Enterprise::join('apply_surveys', 'apply_surveys.empresa_id', 'enterprises.enterprise_id')
                ->join('survey_questions', 'survey_questions.survey_id', 'apply_surveys.survey_id')

                ->leftjoin('question_options', 'question_options.survey_question_id', 'survey_questions.id')

                ->leftJoin('survey_responses as survey_response_abierto', [
                    ['question_options.id', '=', 'survey_response_abierto.question_option_id'],
//                    ['survey_responses.apply_survey_id', '=', 'apply_surveys.id'],
                ])
                ->leftJoin('survey_responses', [
//                    ['question_options.id', '=', 'survey_responses.question_option_id'],
                    ['survey_responses.apply_survey_id', '=', 'apply_surveys.id'],
                ])

                ->select('enterprises.enterprise_id', 'survey_questions.id', 'survey_questions.type_question'
                    , 'survey_responses.response_string'
                    , 'survey_responses.question_option_id'
                    , 'question_options.content')

                ->where('apply_surveys.survey_id', $survey->id)
                ->where('apply_surveys.status', 1)
                ->get();


            foreach ($responses as $response) {
                if ($response->type_question == 1)
                    if (!is_null($response->question_option_id))
                        $respuestas[$response->enterprise_id][$response->id] = $response->content;

                if ($response->type_question == 2)
                    if (!is_null($response->question_option_id))
                        if (isset($respuestas[$response->enterprise_id][$response->id]))
                            $respuestas[$response->enterprise_id][$response->id] = $respuestas[$response->enterprise_id][$response->id] . ', ' . $response->content;
                        else
                            $respuestas[$response->enterprise_id][$response->id] = $response->content;

                if ($response->type_question == 3 or $response->type_question == 4)
                    if (!is_null($response->response_string))
                        $respuestas[$response->enterprise_id][$response->id] = $response->response_string;


            }


            return view('excels.surveys_empresa', [
                'survey' => $survey,
                'empresas' => $empresas,
                'respuestas' => $respuestas
            ]);

        } else { // Alumnos

            $alumnos = Student::join('educative_programs', 'students.educativeProgram_id', 'educative_programs.educativeProgram_id')
                ->join('genders', 'students.gender_id', 'genders.gender_id')
                ->join('contact_students', 'contact_students.student_id', 'students.student_id')
                ->leftJoin('states', 'contact_students.state_id', 'states.id')
                ->join('apply_surveys', 'apply_surveys.student_id', 'students.student_id')
                ->select('students.student_id', DB::raw("CONCAT(students.name, ' ', students.lastName, ' ', students.motherLastNames) AS nombre"),
                    'students.institutionalEmail', 'students.enrollment', DB::raw('genders.name as genero'), DB::raw('educative_programs.displayName as programa_educativo'),
                    'students.dateOfBirth', 'contact_students.address', DB::raw('states.name as estado_republica'), 'contact_students.township', 'contact_students.zip_code',
                    'contact_students.homePhone', 'students.cellPhone', 'students.personalEmail', 'students.facebook', 'contact_students.name_family', 'contact_students.name_family',
                    'contact_students.homePhone_family', 'contact_students.cellPhone_family')
                ->where('apply_surveys.survey_id', $survey->id)
                ->where('apply_surveys.status', 1)
                ->get();
            $responses = Student::join('educative_programs', 'students.educativeProgram_id', 'educative_programs.educativeProgram_id')
                ->join('apply_surveys', 'apply_surveys.student_id', 'students.student_id')
                ->join('survey_questions', 'survey_questions.survey_id', 'apply_surveys.survey_id')
                ->join('question_options', 'question_options.survey_question_id', 'survey_questions.id')
                ->leftJoin('survey_responses', [
                    ['question_options.id', '=', 'survey_responses.question_option_id'],
                    ['survey_responses.apply_survey_id', '=', 'apply_surveys.id'],
                ])
                ->select('students.student_id', 'survey_questions.id', 'survey_questions.type_question', 'survey_responses.response_string', 'survey_responses.question_option_id', 'question_options.content')
                ->where('apply_surveys.survey_id', $survey->id)
                ->where('apply_surveys.status', 1)
                ->get();

            foreach ($responses as $response) {
                if ($response->type_question == 1)
                    if (!is_null($response->question_option_id))
                        $respuestas[$response->student_id][$response->id] = $response->content;

                if ($response->type_question == 2)
                    if (!is_null($response->question_option_id))
                        if (isset($respuestas[$response->student_id][$response->id]))
                            $respuestas[$response->student_id][$response->id] = $respuestas[$response->student_id][$response->id] . ', ' . $response->content;
                        else
                            $respuestas[$response->student_id][$response->id] = $response->content;

                if ($response->type_question == 3 or $response->type_question == 4)
                    if (!is_null($response->response_string))
                        $respuestas[$response->student_id][$response->id] = $response->response_string;


            }


            return view('excels.surveys', [
                'survey' => $survey,
                'alumnos' => $alumnos,
                'respuestas' => $respuestas
            ]);
        }
    }
}
