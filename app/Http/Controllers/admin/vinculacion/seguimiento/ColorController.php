<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $colors = Color::all();

        return view('admin.vinculacion.seguimiento.colors.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.vinculacion.seguimiento.colors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'code' => 'required',
        ]);

        $color = Color::create([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
        ]);

        \Session::flash('flash_message','¡El color se agrego exitosamente!');

        return redirect()->route('colors.index');
    }

    public function edit($id)
    {
        $color = Color::find($id);

        return view('admin.vinculacion.seguimiento.colors.edit', compact('color'));
    }

    public function update(Request $request, $id)
    {
        $color = Color::find($id);

        $request->validate([
            'name' => 'required|string|max:50',
            'code' => 'required',
        ]);

        $color->update([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
        ]);

        \Session::flash('flash_message','¡El color se actualizo exitosamente!');

        return redirect()->route('colors.index');
    }

    public function destroy($id)
    {
        Color::destroy($id);

        return response("El color fue eliminado exitosamente");
    }
}
