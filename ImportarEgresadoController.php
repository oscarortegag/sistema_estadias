<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use App\admin\vinculacion\seguimiento\Egresado;
use Auth;

class ImportarEgresadoController extends Controller
{
    public function __construct(){
           $this->middleware('auth');    
    }     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \Session::forget('dataFail');
        return view('admin.vinculacion.seguimiento.importsegresados.create');
    }

    public function store(Request $request)
    {
            $fecha = date("Y-m-d h:m:s");
            $nombre = md5(time());
            $file = $request->file('archivo');
            $tipo = $file->getMimeType();

            \Storage::disk('local')->put($nombre.".xlsx", \File::get($file));

            \Session::forget('dataFail');
            $file = storage_path("app/".$nombre.".xlsx");
            $spreadsheet = new Spreadsheet();
            $reader = new Xlsx();

            $spreadsheet = $reader->load($file);
            $sheetData = $spreadsheet->getSheet(0)->toArray(null, true, true, true);

            $row = 1;
            $importerRow = 0;
            $importerRowFail = 0;
            $importerRowFailData = [];

            foreach($sheetData as $data){
                    $result = $this->validation($data);

                    if(($result == 0) && ($row > 2)){

                        $newEgresado = Egresado::where('apellido_paterno','=',$data["A"])->get();
                        if($newEgresado->count() == 0){
                            $egresados = new Egresado;
                            $egresados->apellido_paterno = $data["A"];
                            $egresados->apellido_materno = $data["B"];
                            $egresados->nombre = $data["C"];
                            $egresados->carrera = $data["D"];
                            $egresados->correo_electronico = $data["E"];
                            $egresados->numero_telefono = $data["F"];
                            $egresados->año_egreso = $data["G"];                   
                            $egresados->save();

                            $importerRow++;
                        }else{
                              $importerRowFailData[] = ["0"=>$data,"1"=>"Error: registro duplicado"];
                              $importerRowFail++;                              
                        }


                    }else if(($row > 2) && ($result > 0 && $result != 10)){
                            // $importerRowFailData[] = $data;
                             $importerRowFailData[] = ["0"=>$data,"1"=>$error]; 
                             $importerRowFail++;
                    }

                    $row++;
            }

            $information = array($importerRowFailData,$importerRow,$importerRowFail);
            \Session::put('dataFail',$information);
            return redirect()->route('importsegresado.show',0);
            /*
            $doc = IOFactory::load($file);
            $hoja = $doc->getSheet(0);
            $coordenadas = "A3";

            $celda = $hoja->getCellByColumnAndRow(1,3);

            $celda = $hoja->getCell($coordenadas);
            dd($celda->getValue());*/

    }
    public function validation($data = []){

        $column = array("A","B","C","D","E","F","G");
        $items = count($column);
        $cont = 0;
        for($i=0; $i<$items; $i++){
            if(is_null($data[$column[$i]]) || $data[$column[$i]] ==" "){
               $cont++;
            }
        }
        return $cont;
 }
}