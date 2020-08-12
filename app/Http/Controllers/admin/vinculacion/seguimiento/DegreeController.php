<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\Degree;
use Auth;

class DegreeController extends Controller
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
           $degree = Degree::withTrashed()->get();
           return view('admin.vinculacion.seguimiento.degrees.index', compact('degree'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vinculacion.seguimiento.degrees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $degr = new Degree;
        $degr->code = $request->codigo;
        $degr->degreeName = $request->carrera; 
        $degr->save();
        \Session::flash('flash_message','¡La información ha sido registrada existosamente!');
        return redirect()->route('degrees.index');
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
        $degree = Degree::find($id);
        return view('admin.vinculacion.seguimiento.degrees.edit', compact('degree'));
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
        $degr = Degree::find($id);
        $degr->code = $request->codigo;
        $degr->degreeName = $request->carrera; 
        $degr->save();

       \Session::flash('flash_message','¡La información ha sido actualizada existosamente!');       
        return redirect()->route('degrees.edit',['id'=>$id]);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Degree::find($id)->delete();
        \Session::flash('flash_message','¡La información ha sido ocultada!');        
        return redirect()->route('degrees.index');
    }

    public function restore($id){
        Degree::onlyTrashed($id)->restore();
        \Session::flash('flash_message','¡La información ha sido restablecido!');          
        return redirect()->route('degrees.index');     
    }     
}
