<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\EditorStyle;

class EditorStyleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $editor = EditorStyle::all();
           return view('admin.vinculacion.seguimiento.editors.index', compact('editor')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vinculacion.seguimiento.editors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $editor = new EditorStyle;
        $editor->nameEditorialAdvisor = $request->nombreeditor;
        $editor->editorialPosition = $request->cargoeditor;
        $editor->editorialAdvisorEmail = $request->correoeditor;
        $editor->editorialAdvisorPhone = $request->telefonoeditor;
        $editor->save();
        return redirect()->route('editors.index');
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
        $editor = EditorStyle::find($id);

        return view('admin.vinculacion.seguimiento.editors.edit', compact('editor')); 
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
           $editor = EditorStyle::find($id);
           $editor->nameEditorialAdvisor = $request->nombreeditor;
           $editor->editorialPosition = $request->cargoeditor;
           $editor->editorialAdvisorEmail = $request->correoeditor;
           $editor->editorialAdvisorPhone = $request->telefonoeditor;
           $editor->save();

           return redirect()->route('editors.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EditorStyle::find($id)->delete();
        return redirect()->route('editors.index');
    }
}
