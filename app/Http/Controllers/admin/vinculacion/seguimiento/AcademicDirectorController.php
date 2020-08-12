<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\AcademicDirector;
use App\admin\vinculacion\seguimiento\Gender;
use App\admin\vinculacion\seguimiento\AcademicDivision;
use Auth;

class AcademicDirectorController extends Controller
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
           $director = AcademicDirector::withTrashed()->get();
           $division = AcademicDivision::all();
           $gender = Gender::all();
           return view('admin.vinculacion.seguimiento.directors.index', compact('director','division','gender'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           $director = AcademicDirector::withTrashed()->get();
           $division = AcademicDivision::all();
           $gender = Gender::all();
           return view('admin.vinculacion.seguimiento.directors.create', compact('director','division','gender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $dir = new AcademicDirector;
            $dir->academicDivision_id = $request->division;
            $dir->nameDirector = $request->nombreDirector;
            $dir->gender_id = $request->gender;
            $dir->nameEmail = $request->correoDirector;
            $dir->directorPhone = $request->telefonoDirector;
            $dir->save();
            \Session::flash('flash_message','¡La información ha sido registrada existosamente!');
            return redirect()->route('directors.index');                        
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
        $director = AcademicDirector::find($id);
        $division = AcademicDivision::all();
        $gender = Gender::all();

        return view('admin.vinculacion.seguimiento.directors.edit', compact('director','division','gender')); 
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
            $dir = AcademicDirector::find($id);
            $dir->academicDivision_id = $request->division;
            $dir->nameDirector = $request->nombreDirector;
            $dir->gender_id = $request->gender;
            $dir->nameEmail = $request->correoDirector;
            $dir->directorPhone = $request->telefonoDirector;
            $dir->save();

            \Session::flash('flash_message','¡La información ha sido actualizada existosamente!');
            return redirect()->route('directors.edit',['id'=>$id]);             
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AcademicDirector::find($id)->delete();
        \Session::flash('flash_message','¡La información ha sido ocultada!');        
        return redirect()->route('directors.index');
    }

    public function restore($id){
        AcademicDirector::onlyTrashed($id)->restore();
        \Session::flash('flash_message','¡La información ha sido restablecido!');          
        return redirect()->route('directors.index');        
    }    
}
