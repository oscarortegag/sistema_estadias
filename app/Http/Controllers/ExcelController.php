<?php

namespace App\Http\Controllers;

use App\admin\vinculacion\seguimiento\Survey;
use Illuminate\Http\Request;
use App\Exports\SurveysExport;
use Maatwebsite\Excel\Facades\Excel;


class ExcelController extends Controller
{
    function generaExcel($id){

        return Excel::download(new SurveysExport($id), 'surveys.xlsx');

    }
}
