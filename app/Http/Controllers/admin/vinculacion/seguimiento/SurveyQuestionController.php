<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\Period;
use App\admin\vinculacion\seguimiento\Survey;
use App\admin\vinculacion\seguimiento\SurveyQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SurveyQuestionController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function create(Survey $survey)
    {
        $period = Period::find($survey->period_id);

        return view('admin.vinculacion.seguimiento.questions.create', compact('period', 'survey'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SurveyQuestion  $surveyQuestions
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyQuestion $surveyQuestions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SurveyQuestion  $surveyQuestions
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyQuestion $question)
    {
        $survey = $question->survey;
        $period = Period::find($survey->period_id);

        return view('admin.vinculacion.seguimiento.questions.edit', compact('period', 'survey', 'question' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SurveyQuestion  $surveyQuestions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveyQuestion $surveyQuestions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SurveyQuestion  $surveyQuestions
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurveyQuestion $surveyQuestions)
    {
        //
    }
}
