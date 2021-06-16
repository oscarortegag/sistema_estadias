<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\Period;
use App\admin\vinculacion\seguimiento\Student;
use App\Mail\EmailSend;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\Egresado;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class EgresadoController extends Controller
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
        $students = Egresado::where('period_id',$period->period_id)->with('student')->get();

        return view('admin.vinculacion.seguimiento.egresados.index', compact('period', 'students'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function oldIndex()
    {
        $egresado = Egresado::withTrashed()->get();
        return view('admin.vinculacion.seguimiento.egresados.index', compact('egresado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Period $period)
    {
        return view('admin.vinculacion.seguimiento.egresados.create', compact('period'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send_mail(Period $period)
    {
        return view('admin.vinculacion.seguimiento.egresados.send_mail', compact('period'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function postCreate(Request $request): RedirectResponse
    {
        $alumnos = $request['alumnos'];

        for ($i=0; $i < count($alumnos); $i++ )
        {
            $id_alumno = $alumnos[$i];
            $student = Student::find($id_alumno);

            $egresado = new Egresado;
            $egresado->student_id = $id_alumno;
            $egresado->period_id = $request->period_id;

            //$egresado->año_egreso = $request->egreso;

            $egresado->save();
        }



        \Session::flash('flash_message','¡La información ha sido registrada existosamente!');
        return redirect()->route('egresados.index', ["id"=>$request->period_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function postSendMail(Request $request, $id): RedirectResponse
    {
        $alumnos = $request['alumnos'];

        $archivo = Storage::disk('firmas')->put('firmas', $request->file('signature'));

        for ($i=0; $i < count($alumnos); $i++ )
        {
            $id_alumno = $alumnos[$i];
            $student = Student::find($id_alumno);

            $correo = $student['personalEmail'];

            $data = [
                'subject' => $request['subject'],
                'content' => $request['content'],
                'document' => asset($archivo),
            ];

            Mail::to($correo)->send(new EmailSend($data));
        }

        \Session::flash('flash_message','¡El correo se envió exitosamente!');
        return redirect()->route('egresados.send_mail', ["id"=>$request->period_id]);
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
        $egresado = Egresado::find($id);

        return view('admin.vinculacion.seguimiento.Egresados.edit', compact('egresado'));
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
        $egresado = Egresado::find($id);
        $egresado->apellido_paterno = $request->apellido;
        $egresado->apellido_materno = $request->apellidoma;
        $egresado->nombre = $request->nombre;
        $egresado->period_id = $request->periodo;
        $egresado->carrera = $request->carrera;
        $egresado->correo_electronico = $request->correo;
        $egresado->numero_telefono = $request->numero;
        $egresado->año_egreso = $request->egreso;
        $egresado->save();

            \Session::flash('flash_message','¡La información ha sido actualizada existosamente!');
            return redirect()->route('Egresados.edit',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Enterprise::destroy($id);
        Enterprise::find($id)->delete();
        \Session::flash('flash_message','¡La información ha sido ocultada!');
        return redirect()->route('Egresados.index');
    }

    public function restore($id){
        Enterprise::onlyTrashed($id)->restore();
        \Session::flash('flash_message','¡La información ha sido restablecido!');
        return redirect()->route('Egresados.index');
    }
}
