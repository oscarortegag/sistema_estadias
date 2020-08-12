<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\AcademicAdvisor;
use Auth;

class AcademicAdvisorController extends Controller
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
           $advisor = AcademicAdvisor::withTrashed()->get();
           return view('admin.vinculacion.seguimiento.advisors.index', compact('advisor'));          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vinculacion.seguimiento.advisors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $advisor = new AcademicAdvisor;
        $advisor->nameAcademicAdvisor = $request->nombreacademico;
        $advisor->academicPosition = $request->cargoasesor;
        $advisor->academicAdvisorEmail = $request->correoasesor;
        $advisor->advisorPhone = $request->telefonoasesor;
        $advisor->save();

        \Session::flash('flash_message','¡La información ha sido registrada existosamente!');
        return redirect()->route('advisors.index');         
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
        $advisor = AcademicAdvisor::find($id);

        return view('admin.vinculacion.seguimiento.advisors.edit', compact('advisor')); 
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
           $advisor = AcademicAdvisor::find($id);
           $advisor->nameAcademicAdvisor = $request->nombreacademico;
           $advisor->academicPosition = $request->cargoasesor;
           $advisor->academicAdvisorEmail = $request->correoasesor;
           $advisor->advisorPhone = $request->telefonoasesor;
           $advisor->save();

           \Session::flash('flash_message','¡La información ha sido actualizada existosamente!');       
            return redirect()->route('advisors.edit',['id'=>$id]);                       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AcademicAdvisor::find($id)->delete();
        \Session::flash('flash_message','¡La información ha sido ocultada!');        
        return redirect()->route('advisors.index');
    }

    public function restore($id){
        AcademicAdvisor::onlyTrashed($id)->restore();
        \Session::flash('flash_message','¡La información ha sido restablecido!');          
        return redirect()->route('advisors.index');     
    }     
}
