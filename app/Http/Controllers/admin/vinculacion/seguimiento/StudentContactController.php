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
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Auth;


//use App\User;

class StudentContactController extends Controller
{
    public function __construct(){
           $this->middleware('auth');           
           \Session::forget('error');
         
    }   
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

        \Session::forget('error');
        $locked = '';
        if(\Session::get('perfil') == 2){
           $locked = "readonly";
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

            $rules = array(    
            'telCelular' => 'required',
            'facebook' => 'required',            
            'correoPersonal' => 'required|email',
            'correoPersonalConfirma' => 'required|email',
            );

            $messsages = array(
            'telCelular.required'  => 'Se requiere especificar el número de celular',
            'facebook.required'  => 'Se require especificar su facebook',
            'correoPersonal.required'  => 'Se requiere especificar el correo electrónico personal',
            'correoPersonalConfirma.required'  => 'Se requiere especificar el correo electrónico de confirmación',
            );

            $validator = Validator::make($request->all(),$rules,$messsages);            
            if($validator->fails()){
                  return redirect()->back()->withErrors($validator)->withInput();
            }

            if (strcasecmp($request->correoPersonal, $request->correoPersonalConfirma) != 0) {
                $msg = array("¡ Su correo electrónico personal no coincide con su correo electrónico personal de confirmación!");
                \Session::put('error', $msg);
                return redirect()->back();
            }

            $tmp = explode("@",$request->correoPersonal);
            $find = strpos($request->correo,$tmp[1]);
            if($find){
               $msg = array("¡ Su correo electrónico personal debe ser diferente al correo institucional !");
                \Session::put('error', $msg);                           
                return redirect()->back();
            }            

            $idE = decrypt($id);
            $student = Student::find($idE);

            if(\Session::get('perfil') == 2){
               $student->cellPhone = $request->telCelular;
               $student->officePhone = $request->telOficina;
               $student->personalEmail= $request->correoPersonal;
               $student->facebook = $request->facebook;
               $student->verified = 1;
               $student->save();
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
