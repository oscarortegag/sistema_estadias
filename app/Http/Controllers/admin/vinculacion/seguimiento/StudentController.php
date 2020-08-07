<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\admin\vinculacion\seguimiento\Student;
use App\admin\vinculacion\seguimiento\EducativeProgram;
use App\admin\vinculacion\seguimiento\Enterprise;
use App\admin\vinculacion\seguimiento\SchoolOrigin;
use App\admin\vinculacion\seguimiento\Degree;
use App\admin\vinculacion\seguimiento\Period;
use App\admin\vinculacion\seguimiento\Institution;
use App\admin\vinculacion\seguimiento\Gender;
use App\admin\vinculacion\seguimiento\Quarter;
use App\admin\vinculacion\seguimiento\Group;
use App\admin\vinculacion\seguimiento\Shifts;
use App\admin\vinculacion\seguimiento\Modality;
use App\admin\vinculacion\seguimiento\AcademicDirector;
use App\admin\vinculacion\seguimiento\AcademicAdvisor;
use App\admin\vinculacion\seguimiento\EditorStyle;
use App\admin\vinculacion\seguimiento\ResponsibleLinking;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    function index(Period $period)
    {
        $students = Student::where('period_id',$period->period_id)->get();

        return view('admin.vinculacion.seguimiento.students.index', compact('period', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idSearch = decrypt($id);
        $student = Student::find($idSearch);

        $program = EducativeProgram::all();
        $enterprise = Enterprise::all();
        $school = SchoolOrigin::all();
        $degree = Degree::all();
        $institution = Institution::all();
        $period = Period::all();
        $gender = Gender::all();
        $quarter = Quarter::all();
        $group = Group::all();
        $shift = Shifts::all();
        $outTime = array(array("id"=>"SI"),array("id"=>"NO"));
        $modality = Modality::all();
        $director = AcademicDirector::all();
        $advisor = AcademicAdvisor::all();
        $editor = EditorStyle::all();
        $link = ResponsibleLinking::all();

        return view('admin.vinculacion.seguimiento.students.edit', compact('student','institution','period','gender','quarter','group','shift','outTime','modality','director','advisor','editor','link','program','enterprise','school','degree'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }    

}
