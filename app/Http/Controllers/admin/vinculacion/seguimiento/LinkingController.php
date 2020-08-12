<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\ResponsibleLinking;
use Auth;

class LinkingController extends Controller
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
           $linking = ResponsibleLinking::withTrashed()->get();
           return view('admin.vinculacion.seguimiento.linkings.index', compact('linking')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vinculacion.seguimiento.linkings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $liking = new ResponsibleLinking;
        $liking->nameResponsible = $request->nombrevinculacion;
        $liking->responsiblePosition = $request->cargovinculacion;
        $liking->responsibleEmail = $request->correovinculacion;
        $liking->responsiblePhone = $request->telefonovinculacion;
        $liking->save();

        \Session::flash('flash_message','¡La información ha sido registrada existosamente!');
        return redirect()->route('linkings.index');          
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
        $linking = ResponsibleLinking::find($id);
        return view('admin.vinculacion.seguimiento.linkings.edit', compact('linking'));
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
        $liking = ResponsibleLinking::find($id);
        $liking->nameResponsible = $request->nombrevinculacion;
        $liking->responsiblePosition = $request->cargovinculacion;
        $liking->responsibleEmail = $request->correovinculacion;
        $liking->responsiblePhone = $request->telefonovinculacion;
        $liking->save();

       \Session::flash('flash_message','¡La información ha sido actualizada existosamente!');       
        return redirect()->route('linkings.edit',['id'=>$id]);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ResponsibleLinking::find($id)->delete();
        \Session::flash('flash_message','¡La información ha sido ocultada!');        
        return redirect()->route('linkings.index');
    }

    public function restore($id){
        ResponsibleLinking::onlyTrashed($id)->restore();
        \Session::flash('flash_message','¡Leditorsa información ha sido restablecido!');          
        return redirect()->route('linkings.index');   
    }     
}
