<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\EducativeProgram;
use Auth;

class EducativeProgramController extends Controller
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
           $programs = EducativeProgram::withTrashed()->get();
           return view('admin.vinculacion.seguimiento.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('admin.vinculacion.seguimiento.programs.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $pro = new EducativeProgram;
            $pro->shortName = $request->shortName;
            $pro->displayName = $request->displayName;
            $pro->save();

            \Session::flash('flash_message','¡La información ha sido registrada existosamente!');
            return redirect()->route('programs.index');              
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
            $programs = EducativeProgram::find($id);
            return view('admin.vinculacion.seguimiento.programs.edit', compact('programs')); 
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
            $pro = EducativeProgram::find($id);
            $pro->shortName = $request->shortName;
            $pro->displayName = $request->displayName;
            $pro->save();

           \Session::flash('flash_message','¡La información ha sido actualizada existosamente!');       
            return redirect()->route('programs.edit',['id'=>$id]);             
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EducativeProgram::find($id)->delete();
        \Session::flash('flash_message','¡La información ha sido ocultada!');        
        return redirect()->route('programs.index');
    }

    public function restore($id){
        EducativeProgram::onlyTrashed($id)->restore();
        \Session::flash('flash_message','¡La información ha sido restablecido!');          
        return redirect()->route('programs.index');     
    }     
}
