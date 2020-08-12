<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\Modality;
use Auth;

class ModalityController extends Controller
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
           $modality = Modality::withTrashed()->get();
           return view('admin.vinculacion.seguimiento.modalities.index', compact('modality'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vinculacion.seguimiento.modalities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mod = new Modality;
        $mod->modalityName = $request->modalidad;
        $mod->save();
        \Session::flash('flash_message','¡La información ha sido registrada existosamente!');
        return redirect()->route('modalities.index');
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
        $modality = Modality::find($id);
        return view('admin.vinculacion.seguimiento.modalities.edit', compact('modality'));
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
        $inst = Modality::find($id);
        $inst->modalityName = $request->modalidad;
        $inst->save();

       \Session::flash('flash_message','¡La información ha sido actualizada existosamente!');
        return redirect()->route('modalities.edit',['id'=>$id]);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Modality::find($id)->delete();
        \Session::flash('flash_message','¡La información ha sido ocultada!');        
        return redirect()->route('modalities.index');
    }

    public function restore($id){
        Modality::onlyTrashed($id)->restore();
        \Session::flash('flash_message','¡La información ha sido restablecido!');          
        return redirect()->route('modalities.index');     
    }     
}
