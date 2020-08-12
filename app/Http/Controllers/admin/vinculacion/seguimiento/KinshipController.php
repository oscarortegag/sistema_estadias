<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\Kinship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class KinshipController extends Controller
{
    public function __construct(){
           $this->middleware('auth');    
    }     
    public function index()
    {
        $kinships = Kinship::all();

        return view('admin.vinculacion.seguimiento.kinships.index', compact('kinships'));
    }

    public function create()
    {
        return view('admin.vinculacion.seguimiento.kinships.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
        ]);


        $kinship = Kinship::create([
            'name' => $request->input('name'),
        ]);


        return redirect()->route('kinships.index');
    }

    public function edit($id)
    {
        $kinship = Kinship::find($id);

        return view('admin.vinculacion.seguimiento.kinships.edit', compact('kinship'));
    }

    public function update(Request $request, $id)
    {
        $kinship = Kinship::find($id);

        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $kinship->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('kinships.index');
    }

    public function destroy($id)
    {
        Kinship::destroy($id);
        return redirect()->route('kinships.index');
    }
}
