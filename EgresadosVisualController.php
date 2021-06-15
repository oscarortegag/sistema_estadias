<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\admin\vinculacion\seguimiento\Egresado;

use App\admin\vinculacion\seguimiento\Period;

use App\User;
use Auth;

class EgresadosVisualController extends Controller
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
        $egresado = Egresado::where('period_id',$period->period_id)->get();

        return view('admin.vinculacion.seguimiento.seguimientoegresados.visual', compact('period', 'egresado'));
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
            return redirect()->route('seguimientoegresados.edit',['id'=>$id]);            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }    

}
