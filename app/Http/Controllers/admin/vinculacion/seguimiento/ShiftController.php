<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\Shifts;
use Auth;

class ShiftController extends Controller
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
           $shift = Shifts::withTrashed()->get();
           return view('admin.vinculacion.seguimiento.shifts.index', compact('shift'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vinculacion.seguimiento.shifts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shift = new Shifts;
        $shift->name = $request->turno;
        $shift->save();
        \Session::flash('flash_message','¡La información ha sido registrada existosamente!');
        return redirect()->route('shift.index');
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
        $shift = Shifts::find($id);
        return view('admin.vinculacion.seguimiento.shifts.edit', compact('shift'));
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
        $shift = Shifts::find($id);
        $shift->name = $request->turno;
        $shift->save();

        \Session::flash('flash_message','¡La información ha sido actualizada existosamente!');
        return redirect()->route('shift.edit',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Shifts::find($id)->delete();
        \Session::flash('flash_message','¡La información ha sido ocultada!');        
        return redirect()->route('shift.index');
    }

    public function restore($id){
        Shifts::onlyTrashed($id)->restore();
        \Session::flash('flash_message','¡La información ha sido restablecido!');          
        return redirect()->route('shift.index');        
    }     
}
