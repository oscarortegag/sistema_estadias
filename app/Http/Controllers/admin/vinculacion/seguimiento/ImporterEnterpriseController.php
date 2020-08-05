<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use App\admin\vinculacion\seguimiento\Enterprise;

class ImporterEnterpriseController extends Controller
{
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
        return view('admin.vinculacion.seguimiento.importscompany.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

                        $enterprise = new Enterprise;
                        $enterprise->companyName = $data["A"];
                        $enterprise->businessName = $data["B"];
                        $enterprise->companyPhone = $data["C"];
                        $enterprise->representativeName = $data["D"];
                        $enterprise->representativePosition = $data["E"];
                        $enterprise->businessAdvisorName = $data["F"];
                        $enterprise->businessAdvisorEmail = $data["G"];
                        $enterprise->businessAdvisorPhone = $data["H"];
                        $enterprise->businessContactName = $data["I"];
                        $enterprise->businessContactEmail = $data["J"];
                        $enterprise->businessContactPhone = $data["K"];                        
                        $enterprise->importDate = date("Y-m-d");                     
                        $enterprise->save();

                        $importerRow++;
                    }else if(($row > 2) && ($result > 0 && $result != 10)){
                             $importerRowFailData[] = $data; 
                             $importerRowFail++;
                    }

                    $row++;
            }

            $information = array($importerRowFailData,$importerRow,$importerRowFail);
            \Session::put('dataFail',$information);
            return redirect()->route('importscompany.show',0);
            /*
            $doc = IOFactory::load($file);
            $hoja = $doc->getSheet(0);
            $coordenadas = "A3";

            $celda = $hoja->getCellByColumnAndRow(1,3);

            $celda = $hoja->getCell($coordenadas);
            dd($celda->getValue());*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $information = \Session::get('dataFail');
        $importerRowFailData = $information[0];
        $importerRow = $information[1];
        $importerRowFail = $information[2];

        return view('admin.vinculacion.seguimiento.importscompany.show',compact('importerRowFailData'))->with('importerRow',$importerRow)->with('importerRowFail',$importerRowFail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validation($data = []){

           $column = array("A","B","C","D","E","F","G","H","I","J");
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
