<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\Quarter;
use Auth;

class QuarterController extends Controller
{
    public function __construct(){
           $this->middleware('auth');    
    }       
    /**
     * Display     public function __construct(){
           $this->middleware('auth');    
    }   a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $quarter = Quarter::withTrashed()->get();
           return view('admin.vinculacion.seguimiento.quarters.index', compact('quarter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('admin.vinculacion.seguimiento.quarters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quar = new Quarter;
        $quar->number = $request->number;
        $quar->quarterName = $request->quarterName;            
        $quar->save();

        \Session::flash('flash_message','¡La información ha sido registrada existosamente!');
        return redirect()->route('quarters.index');          
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
       $quarter = Quarter::find($id);
        return view('admin.vinculacion.seguimiento.quarters.edit', compact('quarter'));
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
        $quar = Quarter::find($id);
        $quar->number = $request->number;
        $quar->quarterName = $request->quarterName;     
        $quar->save();

       \Session::flash('flash_message','¡La información ha sido actualizada existosamente!');       
        return redirect()->route('quarters.edit',['id'=>$id]);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Quarter::find($id)->delete();
        \Session::flash('flash_message','¡La información ha sido ocultada!');         
        return redirect()->route('quarters.index');
    }

    public function restore($id){
        Quarter::onlyTrashed($id)->restore();
        \Session::flash('flash_message','¡La información ha sido restablecido!');          
        return redirect()->route('quarters.index');     
    }     
}
