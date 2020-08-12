<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\SchoolOrigin;
use Auth;

class SchoolOriginController extends Controller
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
           $school = SchoolOrigin::withTrashed()->get();
           return view('admin.vinculacion.seguimiento.schools.index', compact('school'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vinculacion.seguimiento.schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $scho = new SchoolOrigin;
        $scho->schoolName = $request->school;
        $scho->shortName = $request->siglas;        
        $scho->save();
        \Session::flash('flash_message','¡La información ha sido registrada existosamente!');
        return redirect()->route('schools.index');
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
        $schools = SchoolOrigin::find($id);
        return view('admin.vinculacion.seguimiento.schools.edit', compact('schools'));
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
        $scho = SchoolOrigin::find($id);
        $scho->schoolName = $request->school;
        $scho->shortName = $request->siglas; 
        $scho->save();

       \Session::flash('flash_message','¡La información ha sido actualizada existosamente!');
        return redirect()->route('schools.edit',['id'=>$id]);         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SchoolOrigin::find($id)->delete();
        \Session::flash('flash_message','¡La información ha sido ocultada!');        
        return redirect()->route('schools.index');        
    }

    public function restore($id){
        SchoolOrigin::onlyTrashed($id)->restore();
        \Session::flash('flash_message','¡La información ha sido restablecido!');          
        return redirect()->route('schools.index');     
    }      
}
