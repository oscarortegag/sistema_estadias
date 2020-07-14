<?php

namespace App\Http\Controllers;

use App\admin\vinculacion\seguimiento\Kinship;
use Illuminate\Http\Request;

class KinshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kinships = Kinship::all();

        return view('admin.vinculacion.seguimiento.kinships.index', compact('kinships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\admin\vinculacion\seguimiento\Kinship  $kinship
     * @return \Illuminate\Http\Response
     */
    public function show(Kinship $kinship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\admin\vinculacion\seguimiento\Kinship  $kinship
     * @return \Illuminate\Http\Response
     */
    public function edit(Kinship $kinship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\admin\vinculacion\seguimiento\Kinship  $kinship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kinship $kinship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\admin\vinculacion\seguimiento\Kinship  $kinship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kinship $kinship)
    {
        //
    }
}
