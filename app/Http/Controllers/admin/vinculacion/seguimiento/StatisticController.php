<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\EducativeProgram;
use App\admin\vinculacion\seguimiento\Period;
use App\admin\vinculacion\seguimiento\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    function index(Period $period)
    {
        $educativePrograms = EducativeProgram::all();
        $students = Student::where('period_id', $period->period_id);
        $studentByAge = Student::join('educative_programs', 'students.educativeProgram_id', 'educative_programs.educativeProgram_id')
            ->select('students.educativeProgram_id', DB::raw("YEAR(CURDATE())-YEAR(dateOfBirth) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(`dateOfBirth`,'%m-%d'), 0 , -1 ) AS `edad`"))
            ->where('students.period_id', $period->period_id)
            ->get();

        $responses = Student::join('educative_programs', 'students.educativeProgram_id', 'educative_programs.educativeProgram_id')
            ->join('apply_surveys', 'apply_surveys.student_id', 'students.student_id')
            ->join('survey_questions', 'survey_questions.survey_id', 'apply_surveys.survey_id')
            ->join('question_options', 'question_options.survey_question_id', 'survey_questions.id')
            ->join('survey_responses', [
                ['question_options.id', '=', 'survey_responses.question_option_id'],
                ['survey_responses.apply_survey_id', '=', 'apply_surveys.id'],
            ])
            ->select('students.educativeProgram_id','apply_surveys.survey_id',DB::raw('survey_questions.id as question_id'), DB::raw('survey_responses.question_option_id as option_id'))
            ->where('students.period_id', $period->period_id)
            ->whereIn('survey_questions.type_question', [1, 2])
            ->get();

        //dd($responses);

        return view('admin.vinculacion.seguimiento.statistics.index', compact('period', 'educativePrograms', 'students', 'studentByAge', 'responses'));
    }

    function alumnosPorCarrera(Period $period)
    {
        $educativePrograms = EducativeProgram::all();

        $data = array();

        foreach ($educativePrograms as $educativeProgram) {
            if ($educativeProgram->students->count() > 0) {
                    $data[] =  array(
                        'value' => $educativeProgram->students->count(),
                        'color' => $educativeProgram->color->code,
                        'highlight' => $educativeProgram->color->code,
                        'label'=> $educativeProgram->shortName
                            );
            }
        }

        return json_encode($data);
    }
}
