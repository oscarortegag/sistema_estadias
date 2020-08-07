<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\AcademicDirector;
use App\admin\vinculacion\seguimiento\Gender;
use App\admin\vinculacion\seguimiento\AcademicDivision;

class AcademicDirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $director = AcademicDirector::all();
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
           $director = AcademicDirector::all();
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

            return redirect()->route('directors.index');  
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
        return redirect()->route('directors.index');
    }
}
