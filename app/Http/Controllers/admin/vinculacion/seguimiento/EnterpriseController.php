<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\vinculacion\seguimiento\Enterprise;

class EnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enterprise = Enterprise::all();
        return view('admin.vinculacion.seguimiento.enterprise.index', compact('enterprise'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vinculacion.seguimiento.enterprise.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $enterprise = new Enterprise;
        $enterprise->companyName = $request->nombre;
        $enterprise->businessName = $request->razonsocial;
        $enterprise->companyPhone = $request->telefono;
        $enterprise->representativeName = $request->representante;
        $enterprise->representativePosition = $request->cargo;
        $enterprise->businessAdvisorName = $request->nombreasesor;
        $enterprise->businessAdvisorEmail = $request->correoasesor;
        $enterprise->businessAdvisorPhone = $request->telefonoasesor;
        $enterprise->businessContactName = $request->nombrecontacto;
        $enterprise->businessContactEmail = $request->correocontacto;
        $enterprise->businessContactPhone = $request->telefonocontacto;
        $enterprise->save();

        return redirect()->route('enterprise.index');
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
        $enterprise = Enterprise::find($id);

        return view('admin.vinculacion.seguimiento.enterprise.edit', compact('enterprise'));        
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
           $enterprise = Enterprise::find($id);
           $enterprise->companyName = $request->nombre;
           $enterprise->businessName = $request->razonsocial;
           $enterprise->companyPhone = $request->telefono;
           $enterprise->save();

           return redirect()->route('enterprise.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Enterprise::destroy($id);
        Enterprise::find($id)->delete();
        return redirect()->route('enterprise.index');        
    }
}
