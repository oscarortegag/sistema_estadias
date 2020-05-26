<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\Period;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SeguimientoController extends Controller
{
    function index()
    {

        $periodos = Period::select(DB::raw("CONCAT_WS(' ',Year(year), displayName) AS nombre"), 'id')
            ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
            ->get();

        return view('admin.vinculacion.seguimiento.index', compact('periodos'));
    }
}
