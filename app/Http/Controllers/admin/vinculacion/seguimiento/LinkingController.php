<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\ResponsibleLinking;

class LinkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $linking = ResponsibleLinking::all();
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

        return redirect()->route('linkings.index');
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
        return redirect()->route('linkings.index');
    }
}
