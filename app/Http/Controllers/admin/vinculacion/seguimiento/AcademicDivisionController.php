<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\AcademicDivision;
use Auth;

class AcademicDivisionController extends Controller
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
           $division = AcademicDivision::withTrashed()->get();
           return view('admin.vinculacion.seguimiento.divisions.index', compact('division'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('admin.vinculacion.seguimiento.divisions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aca = new AcademicDivision;
        $aca->nameDivision = $request->division;     
        $aca->save();

        \Session::flash('flash_message','¡La información ha sido registrada existosamente!');
        return redirect()->route('divisions.index');          
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
        $division = AcademicDivision::find($id);
        return view('admin.vinculacion.seguimiento.divisions.edit', compact('division'));
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
        $aca = AcademicDivision::find($id);
        $aca->nameDivision = $request->division;     
        $aca->save();

       \Session::flash('flash_message','¡La información ha sido actualizada existosamente!');       
        return redirect()->route('divisions.edit',['id'=>$id]);          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AcademicDivision::find($id)->delete();
        \Session::flash('flash_message','¡La información ha sido ocultada!');        
        return redirect()->route('divisions.index');
    }

    public function restore($id){
        AcademicDivision::onlyTrashed($id)->restore();
        \Session::flash('flash_message','¡La información ha sido restablecido!');          
        return redirect()->route('divisions.index');     
    }     
}
