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
use App\admin\vinculacion\seguimiento\OfficialDocument;
use App\User;
use Auth;

class StudentController extends Controller
{
    public function __construct(){
           $this->middleware('auth');    
    }       
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
        $idSearch = decrypt($id);

        $student = Student::find($idSearch);
        $student->institution_id = $request->university;
        $student->period_id = $request->period;
        $student->name = $request->nombre;
        $student->lastName = $request->apellidoPat;
        $student->motherLastNames = $request->apellidoMat;
        $student->gender_id = $request->gender;
        $student->dateOfBirth = $request->birthday;
        $student->enrollment = $request->matricula;
        $student->quarter_id = $request->quarter;
        $student->group_id = $request->group;
        $student->shift_id = $request->shift;
        $student->socialSecurityNumber = $request->nss;
        $student->accidentInsurance = $request->socialNumber;
        $student->educativeProgram_id = $request->gradoAcademico;
        $student->outOfTime = $request->outTime;
        $student->schoolOrigin_id = $request->school;
        $student->curp = $request->curp;
        $student->institutionalEmail = $request->correo;
        $student->incomeYear = $request->incomeYear;
        $student->degree_id = $request->degree;
        $student->modality_id = $request->modality;
        $student->importDate = date("Y-m-d");
        $student->save();

        $dataEnterprise = Enterprise::find($request->enterprise);
        $period = Period::find($request->period);


        $documentId = $student->document->oficialDocument_id;
        $document = OfficialDocument::find($documentId);
        $document->enterprise_id = $dataEnterprise->enterprise_id;
        $document->representativeName = $dataEnterprise->representativeName;
        $document->representativePosition = $dataEnterprise->representativePosition;
        $document->companyName = $dataEnterprise->companyName;
        $document->businessAdvisor = $dataEnterprise->businessAdvisorName;
        $document->nameRectorUniversity = $request->rectorName;
        $document->presentationDate = $request->presentationDate;
        $document->releaseDate = $request->releaseDate;
        $document->startDate = $period->firstDay;
        $document->endDate = $period->lastDay;
        $document->hoursStay = $request->horas;
        $document->academicDirector_id = $request->director;
        $document->academicAdvisor_id = $request->advisor;
        $document->editorialAdvisor_id = $request->editor;
        $document->responsibleLinking_id = $request->link;
        $document->save();

        \Session::flash('flash_message','La información del alumno se actualizo existosamente');
        return redirect()->route('students.edit',['id'=>$id]);      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $period = \Request::input('period');
        $idSearch = decrypt($id);
        $student = Student::find($idSearch);
        $documentId = $student->document->oficialDocument_id;
        $userId = $student->id;
        $student->document->delete();
        $student->delete();

        $user = User::find($userId);
        $user->roles()->detach();
        $user->delete();

        \Session::flash('flash_message','¡El alumno ha sido eliminado!'); 
        return redirect()->route('students.index',['period'=>$period]);
    }    

}
