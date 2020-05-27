<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use App\admin\vinculacion\seguimiento\Period;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PollController extends Controller
{
    function index(Period $period)
    {
        $polls = DB::table('polls as l')
            ->select(DB::raw("displayName, description"))
            ->where('l.period_id', '=', $period->id)
            ->get();

        return view('admin.vinculacion.seguimiento.polls.index', compact('period', 'polls'));
    }
}
