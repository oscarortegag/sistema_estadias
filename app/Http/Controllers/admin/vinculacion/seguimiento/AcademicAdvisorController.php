<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\AcademicAdvisor;

class AcademicAdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $advisor = AcademicAdvisor::all();
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

           return redirect()->route('advisors.index');           
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
        return redirect()->route('advisors.index');
    }
}
