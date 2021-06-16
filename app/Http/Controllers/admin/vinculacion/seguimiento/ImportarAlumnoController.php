<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use App\User;
use App\admin\vinculacion\seguimiento\Student;
use App\admin\vinculacion\seguimiento\EducativeProgram;
use App\admin\vinculacion\seguimiento\Period;
use App\admin\vinculacion\seguimiento\Quarter;
use App\admin\vinculacion\seguimiento\SchoolOrigin;
use App\admin\vinculacion\seguimiento\Modality;
use App\admin\vinculacion\seguimiento\OfficialDocument;
use App\admin\vinculacion\seguimiento\Enterprise;
use App\admin\vinculacion\seguimiento\AcademicAdvisor;
use App\admin\vinculacion\seguimiento\EditorStyle;
use App\admin\vinculacion\seguimiento\ResponsibleLinking;
use App\admin\vinculacion\seguimiento\AcademicDirector;
use App\admin\vinculacion\seguimiento\Institution;
use App\admin\vinculacion\seguimiento\Degree;
use App\admin\vinculacion\seguimiento\Shifts;
use App\admin\vinculacion\seguimiento\Gender;
use App\admin\vinculacion\seguimiento\Group;
use Illuminate\Support\Facades\Crypt;
use App\Mail\EmailUserNotice;
use Auth;

class ImportarAlumnoController extends Controller
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
        return view('admin.vinculacion.seguimiento.imports.create');
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
            #34 columnas.

            $programEducative = EducativeProgram::all();
            $period = Period::all();
            $quarter = Quarter::all();
            $school = SchoolOrigin::all();
            $modal = Modality::all();
            $enterprise = Enterprise::all();
            $advisor = AcademicAdvisor::all();
            $editor = EditorStyle::all();
            $linking = ResponsibleLinking::all();
            $academicDir = AcademicDirector::all();
            $institution = Institution::all();
            $degree = Degree::all();
            $shift = Shifts::all();
            $gender = Gender::all();
            $group = Group::all();

            foreach($sheetData as $data){
                    $result = $this->validation($data);
                    $error = "";
                    $valida = 0;
                    if($row > 1 && $result != 32){

                        if((is_null($data["A"])) || $data["A"]==" "){
                            $valida++;
                            $error.="A,";
                        }

                        if((is_null($data["B"])) || $data["B"]==" "){
                            $valida++;
                            $error.="B,";
                        }

                        if((is_null($data["C"])) || $data["C"]==" "){
                            $valida++;
                            $error.="C,";
                        }

                        $gen = $gender->where('name','=',$data["D"]);

                        if($gen->count() > 0){
                           foreach ($gen as $item) {
                                   $genId = $item->gender_id;
                           }
                        }else{ $valida++; $error.="D,";}

                        if((is_null($data["E"])) || $data["E"]==" "){
                            $valida++;
                            $error.="E,";
                        }

                        if((is_null($data["F"])) || $data["F"]==" "){
                            $valida++;
                            $error.="F,";
                        }

                        $quart = $quarter->where('number','=',$data["G"]);

                        if($quart->count() > 0){
                           foreach ($quart as $item) {
                                   $quartId = $item->quarter_id;
                           }
                        }else{ $valida++; $error.="G,";}

                        $gro = $group->where('name','=',$data["H"]);

                        if($gro->count() > 0){
                           foreach ($gro as $item) {
                                   $groId = $item->group_id;
                           }
                        }else{ $valida++; $error.="H,";}

                        $shi = $shift->where('name','=',$data["I"]);

                        if($shi->count() > 0){
                           foreach ($shi as $item) {
                                   $shiId = $item->shift_id;
                           }
                        }else{ $valida++; $error.="I,";}

                        if((is_null($data["J"])) || $data["J"]==" "){
                            $valida++;
                            $error.="J,";
                        }

                        $accidentInsurance = $data["K"];
                        if((is_null($data["K"])) || $data["K"]==" "){
                            $accidentInsurance = null;
                        }

                        $per = $period->where('firstDay','=',$data["L"])
                                     ->where('lastDay','=',$data["M"]);

                        if($per->count() > 0){
                           foreach ($per as $item) {
                                   $perId = $item->period_id;
                           }
                        }else{ $valida++; $error.="L y M,";}

                        $program = $programEducative->where('shortName','=',$data["N"]);
                        if($program->count() > 0){
                          foreach ($program as $item) {
                                   $programEducativeId = $item->educativeProgram_id;
                          }
                        }else{ $valida++; $error.="N,";}

                        if((is_null($data["O"])) || $data["O"]==" "){
                            $valida++;
                            $error.="O,";
                        }

                        $schoo = $school->where('schoolName','=',$data["P"]);

                        if($schoo->count() > 0){
                            foreach ($schoo as $item) {
                                     $schooId = $item->schoolOrigin_id;
                            }
                        }else { $valida++; $error.="P,";}

                        if((is_null($data["Q"])) || $data["Q"]==" "){
                            $valida++;
                            $error.="Q,";
                        }

                        if((is_null($data["R"])) || $data["R"]==" "){
                            $valida++;
                            $error.="R,";
                        }else{
                              $tmpEmail = explode('@',$data["R"]);
                        }

                        if((is_null($data["S"])) || $data["S"]==" "){
                            $valida++;
                            $error.="S,";
                        }

                        #añoIngreso
                        if((is_null($data["T"])) || $data["T"]==" "){
                            $valida++;
                            $error.="T,";
                        }

                        #carrera
                        $deg = $degree->where('degreeName','=',$data["U"]);

                        if($deg->count() > 0){
                            foreach ($deg as $item) {
                                     $degId = $item->degree_id;
                            }
                        }else { $valida++; $error.="U,";}

                        $mod = $modal->where('modalityName','=',$data["V"]);

                        if($mod->count() > 0){
                           foreach ($mod as $item) {
                                   $modId = $item->modality_id;
                           }
                        }else{ $valida++; $error.="V,";}

                        $enterp = $enterprise->where('companyName','=',$data["W"]);

                        $dataEnterprise  = array();
                        if($enterp->count() > 0){
                          foreach ($enterp as $item) {
                                   $dataEnterprise[0] = $item->enterprise_id;
                                   $dataEnterprise[1] = $item->representativeName;
                                   $dataEnterprise[2] = $item->representativePosition;
                                   $dataEnterprise[3] = $item->companyName;
                                   $dataEnterprise[4] = $item->businessAdvisorName;
                          }
                        }else { $valida++; $error.="W,";}

                        $adv = $advisor->where('nameAcademicAdvisor','=',$data["X"]);

                        if($adv->count() > 0){
                           foreach ($adv as $item) {
                                    $advId = $item->academicAdvisor_id;
                            }
                        }else{ $valida++; $error.="X,";}

                        $edit = $editor->where('nameEditorialAdvisor','=',$data["Y"]);

                        if($edit->count() > 0){
                           foreach ($edit as $item) {
                                    $editId = $item->editorialAdvisor_id;
                           }
                        }else{ $valida++; $error.="Y,";}

                        $link = $linking->where('nameResponsible','=',$data["Z"]);

                        if($link->count() > 0){
                           foreach ($link as $item) {
                                    $linkId = $item->responsibleLinking_id;
                           }
                        }else{ $valida++; $error.="Z,";}

                        if((is_null($data["AA"])) || $data["AA"]==" "){
                            $valida++;
                            $error.="AA,";
                        }

                        $acaDir = $academicDir->where('nameDirector','=',$data["AB"]);

                        if($acaDir->count() > 0){
                           foreach ($acaDir as $item) {
                                   $acaDirId = $item->academicDirector_id;
                           }
                        }else { $valida++; $error.="AB,"; }

                        if((is_null($data["AC"])) || $data["AC"]==" "){
                            $valida++;
                            $error.="AC,";
                        }

                        if((is_null($data["AD"])) || $data["AD"]==" "){
                            $valida++;
                            $error.="AD,";
                        }

                        $university = $institution->where('name','=',$data["AE"]);

                        if($university->count() > 0){
                           foreach ($university as $item) {
                                    $universityId = $item->institution_id;
                           }
                        }else{ $valida++; $error.="AE,";}

                        $dataJson = $data["AF"];
                        if((is_null($data["AF"])) || $data["AF"]==" "){
                            $dataJson = null;
                        }

                        if($valida==0){
                            $identifica = str_replace(" ","",$data["N"]);
                            $tmpEmail = explode('@',$data["R"]);
                            $newEmail = $tmpEmail[0].".".$identifica."@".$tmpEmail[1];

                            $userFound = User::where('email','=',$newEmail)->get();
                            if($userFound->count()==0){
                                #Add user
                                $password = $this->generarCodigo();
                                $passwordCode = Crypt::encrypt($password);
                                $user = new User;
                                $user->name = $data["A"]." ".$data["B"]." ".$data["C"];
                                $user->email = $newEmail;
                                $user->password = Hash::make($password);
                                $user->save();
                                $insertId = $user->id;

                                #Add students;
                                $student = new Student;
                                $student->id = $insertId;
                                $student->institution_id = $universityId;
                                $student->period_id = $perId;
                                $student->name = $data["A"];
                                $student->lastName = $data["B"];
                                $student->motherLastNames = $data["C"];
                                $student->gender_id = $genId;
                                $student->dateOfBirth = $data["E"];
                                $student->enrollment = $data["F"];
                                $student->quarter_id = $quartId;
                                $student->group_id = $groId;
                                $student->shift_id = $shiId;
                                $student->socialSecurityNumber = $data["J"];
                                $student->accidentInsurance = $data["K"];
                                $student->educativeProgram_id = $programEducativeId;
                                $student->outOfTime = $data["O"];
                                $student->schoolOrigin_id = $schooId;
                                $student->curp = $data["Q"];
                                $student->institutionalEmail = $data["R"];
                                $student->incomeYear = $data["T"];
                                $student->degree_id = $degId;
                                $student->modality_id = $modId;
                                $student->data = $dataJson;
                                $student->code = $passwordCode;
                                $student->importDate = date("Y-m-d");
                                $student->save();



                                $insertIdStudent = $student->student_id;
                                #Add relation user y student
                                $user->roles()->attach(2);
                                #Add official document
                                $document = new OfficialDocument;
                                $document->student_id = $insertIdStudent;
                                $document->enterprise_id = $dataEnterprise[0];
                                $document->representativeName = $dataEnterprise[1];
                                $document->representativePosition = $dataEnterprise[2];
                                $document->companyName = $dataEnterprise[3];
                                $document->businessAdvisor = $dataEnterprise[4];
                                $document->nameRectorUniversity = $data["AA"];
                                $document->presentationDate = $data["AC"];
                                $document->releaseDate = $data["AD"];
                                $document->startDate = $data["L"];
                                $document->endDate = $data["M"];
                                $document->hoursStay = $data["S"];
                                $document->academicDirector_id = $acaDirId;
                                $document->academicAdvisor_id = $advId;
                                $document->editorialAdvisor_id = $editId;
                                $document->responsibleLinking_id = $linkId;
                                $document->save();
                                $importerRow++;

                                $url = route('studentcontact.edit',['id'=>Crypt::encrypt($student->student_id)]);
                                $notification = [
                                    'nombre' => $user->name,
                                    'usuario' => $user->email,
                                    'password' => $password,
                                    'url' => $url,
                                ];
                                //Mail::to($student->institutionalEmail)->send(new EmailUserNotice($notification));
                            }else{
                                 $importerRowFailData[] = ["0"=>$data,"1"=>"Error: registro duplicado"];
                                 $importerRowFail++;
                            }

                        }else if($result != 32){
                                 $importerRowFailData[] = ["0"=>$data,"1"=>$error];
                                 $importerRowFail++;
                        }
                    }

                    $row++;
            }

            $information = array($importerRowFailData,$importerRow,$importerRowFail);
            \Session::put('dataFail',$information);
            return redirect()->route('imports.show',0);
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

        return view('admin.vinculacion.seguimiento.imports.show',compact('importerRowFailData'))->with('importerRow',$importerRow)->with('importerRowFail',$importerRowFail);
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

           $column = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF");
           $items = count($column);
           $cont = 0;
           for($i=0; $i<$items; $i++){
               if(is_null($data[$column[$i]]) || $data[$column[$i]] ==" "){
                  $cont++;
               }
           }
           return $cont;
    }

    public function generarCodigo($longitud = 8) {
             $key = '';
             $pattern = '123456789';
             $max = strlen($pattern)-1;
             for($i=0;$i < $longitud;$i++) $key .= $pattern[mt_rand(0,$max)];
             return $key;
    }
}
