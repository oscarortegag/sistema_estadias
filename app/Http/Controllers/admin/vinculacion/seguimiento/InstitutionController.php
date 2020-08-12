<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\Institution;
use Auth;

class InstitutionController extends Controller
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
           $institution = Institution::withTrashed()->get();
           return view('admin.vinculacion.seguimiento.institutions.index', compact('institution'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vinculacion.seguimiento.institutions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inst = new Institution;
        $inst->name = $request->instituto;
        $inst->save();

        return redirect()->route('institutions.index');        
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
        $institution = Institution::find($id);
        return view('admin.vinculacion.seguimiento.institutions.edit', compact('institution'));
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
        $inst = Institution::find($id);
        $inst->name = $request->instituto;
        $inst->save();
        \Session::flash('flash_message','¡La información ha sido actualizada existosamente!');
        return redirect()->route('institutions.edit',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Institution::find($id)->delete();
        \Session::flash('flash_message','La información ha sido ocultada');        
        return redirect()->route('institutions.index');
    }

    public function restore($id){
        Institution::onlyTrashed($id)->restore();
        \Session::flash('flash_message','La información ha sido restablecido');          
        return redirect()->route('institutions.index');        
    }
}
