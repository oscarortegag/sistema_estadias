<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\Gender;
use Auth;

class GenderController extends Controller
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
           $gender = Gender::withTrashed()->get();
           return view('admin.vinculacion.seguimiento.genders.index', compact('gender'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('admin.vinculacion.seguimiento.genders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gen = new Gender;
        $gen->name = $request->genero;      
        $gen->save();

        \Session::flash('flash_message','¡La información ha sido registrada existosamente!');
        return redirect()->route('genders.index');         
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
        $gender = Gender::find($id);
        return view('admin.vinculacion.seguimiento.genders.edit', compact('gender'));
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
        $gen = Gender::find($id);
        $gen->name = $request->genero;      
        $gen->save();

       \Session::flash('flash_message','¡La información ha sido actualizada existosamente!');       
        return redirect()->route('genders.edit',['id'=>$id]);          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gender::find($id)->delete();
        \Session::flash('flash_message','¡La información ha sido ocultada!');        
        return redirect()->route('genders.index');
    }

    public function restore($id){
        Gender::onlyTrashed($id)->restore();
        \Session::flash('flash_message','¡La información ha sido restablecido!');          
        return redirect()->route('genders.index');     
    }      
}
