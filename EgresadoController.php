<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\Egresado;
use Auth;

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
    public function index()
    {
        $egresado = Egresado::withTrashed()->get();
        return view('admin.vinculacion.seguimiento.Egresados.index', compact('egresado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vinculacion.seguimiento.Egresados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $egresado = new Egresado;
        $egresado->apellido_paterno = $request->apellido;
        $egresado->apellido_materno = $request->apellidoma;
        $egresado->nombre = $request->nombre;
        $egresado->period_id = $request->periodo;
        $egresado->carrera = $request->carrera;
        $egresado->correo_electronico = $request->correo;
        $egresado->numero_telefono = $request->numero;
        $egresado->año_egreso = $request->egreso;
   
        $egresado->save();
        \Session::flash('flash_message','¡La información ha sido registrada existosamente!');
        return redirect()->route('Egresados.index');
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
