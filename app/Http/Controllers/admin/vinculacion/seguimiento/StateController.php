<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    public function index()
    {
        $states = State::all();

        return view('admin.vinculacion.seguimiento.states.index', compact('states'));
    }

    public function create()
    {
        return view('admin.vinculacion.seguimiento.states.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
        ]);


        $state = State::create([
            'name' => $request->input('name'),
        ]);

        \Session::flash('flash_message','¡La estado de la república se agrego exitosamente!');

        return redirect()->route('states.index');
    }

    public function edit($id)
    {
        $state = State::find($id);

        return view('admin.vinculacion.seguimiento.states.edit', compact('state'));
    }

    public function update(Request $request, $id)
    {
        $state = State::find($id);

        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $state->update([
            'name' => $request->input('name'),
        ]);

        \Session::flash('flash_message','¡La estado de la república se actualizo exitosamente!');

        return redirect()->route('states.index');
    }

    public function destroy($id)
    {
        State::destroy($id);

        return response("El estado de la república fue eliminado exitosamente");
    }

}
