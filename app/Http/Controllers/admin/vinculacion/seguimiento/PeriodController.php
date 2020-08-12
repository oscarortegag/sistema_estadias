<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\Period;
use Auth;

class PeriodController extends Controller
{
    public function __construct(){
           $this->middleware('auth');    
    }   
    /**
     * Display a listing of the resource.s
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $period = Period::withTrashed()->get();
           return view('admin.vinculacion.seguimiento.periods.index', compact('period'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('admin.vinculacion.seguimiento.periods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $per = new Period;
        $per->name = $request->quarter;
        $per->year = $request->year;
        $per->firstDay = $request->firstDay;
        $per->lastDay = $request->lastDay;        
        $per->save();

        \Session::flash('flash_message','¡La información ha sido registrada existosamente!');
        return redirect()->route('periods.index');        
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
        $period = Period::find($id);
        return view('admin.vinculacion.seguimiento.periods.edit', compact('period'));
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
        $per = Period::find($id);
        $per->name = $request->quarter;
        $per->year = $request->year;
        $per->firstDay = $request->firstDay;
        $per->lastDay = $request->lastDay;        
        $per->save();

       \Session::flash('flash_message','¡La información ha sido actualizada existosamente!');       
        return redirect()->route('periods.edit',['id'=>$id]);         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Period::find($id)->delete();
        \Session::flash('flash_message','¡La información ha sido ocultada!');        
        return redirect()->route('periods.index');
    }

    public function restore($id){
        Period::onlyTrashed($id)->restore();
        \Session::flash('flash_message','¡La información ha sido restablecido!');          
        return redirect()->route('periods.index');     
    }    
}
