<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\Student;
use App\admin\vinculacion\seguimiento\EducativeProgram;
use App\admin\vinculacion\seguimiento\Enterprise;
use App\admin\vinculacion\seguimiento\SchoolOrigin;
use App\admin\vinculacion\seguimiento\Degree;
use App\admin\vinculacion\seguimiento\Period;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Auth;


//use App\User;

class StudentContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Session::get('perfil') == 2){
            $id = Auth::user()->id;
            $student = Student::where('id','=',$id)->get();
        }else{
              $student = Student::all();
        }

        return view('admin.vinculacion.seguimiento.studentcontacs.index',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $period = Period::all();

        $locked = '';
        if(\Session::get('perfil') == 2){
           $locked = "disabled";
        }

        return view('admin.vinculacion.seguimiento.studentcontacs.edit', compact('student','institution','period','program','enterprise','school','degree'))->with('locked',$locked);
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
           $idE = decrypt($id);
           $student = Student::find($idE);

           if(\Session::get('perfil') == 2){
               $student->cellPhone = $request->telCelular;
               $student->officePhone = $request->telOficina;
               $student->personalEmail= $request->correoPersonal;
               $student->facebook = $request->facebook;
               $student->verified = 1;
               $student->save();
           }else{

           }
           return redirect()->route('studentcontact.index');
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
