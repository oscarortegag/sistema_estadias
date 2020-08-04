<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\admin\vinculacion\seguimiento\Student;
use App\admin\vinculacion\seguimiento\EducativeProgram;
use App\admin\vinculacion\seguimiento\PeriodStay;
use App\admin\vinculacion\seguimiento\Quarter;
use App\admin\vinculacion\seguimiento\SchoolOrigin;
use App\admin\vinculacion\seguimiento\Modality;
use App\admin\vinculacion\seguimiento\OfficialDocument;
use App\admin\vinculacion\seguimiento\Enterprise;
use App\admin\vinculacion\seguimiento\AcademicAdvisor;
use App\admin\vinculacion\seguimiento\EditorStyle;
use App\admin\vinculacion\seguimiento\ResponsibleLinking;
use App\admin\vinculacion\seguimiento\AcademicDirector;

class AlumnosCollectionImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    protected $code;
    public function collection(Collection $collection)
    {
        $registrado = 0;
        $fila = 0;

        $programEducative = EducativeProgram::all();
        $period = PeriodStay::all();
        $quarter = Quarter::all();
        $school = SchoolOrigin::all();
        $modal = Modality::all();
        $enterprise = Enterprise::all();
        $advisor = AcademicAdvisor::all();
        $editor = EditorStyle::all();
        $linking = ResponsibleLinking::all();
        $academicDir = AcademicDirector::all();

        foreach ($collection as $data) {
            if($fila > 1){
                    if(!is_null($data[0])){

                       $program = $programEducative->where('shortName','=',$data[13]);
                       if($program->count() > 0){
                          foreach ($program as $item) {
                                   $programEducativeId = $item->educativeProgram_id;
                          }                          
                       }

                       $per = $period->where('firstDay','=',$data[11])
                                     ->where('lastDay','=',$data[12]);

                       if($per->count() > 0){
                          foreach ($per as $item) {
                                   $perId = $item->period_id;
                          }                          
                      }

                       $quart = $quarter->where('number','=',$data[6]);

                       if($quart->count() > 0){
                          foreach ($quart as $item) {
                                   $quartId = $item->quarter_id;
                          }                                                   
                       }

                      $schoo = $school->where('schoolName','=',$data[15]);

                       if($schoo->count() > 0){
                          foreach ($schoo as $item) {
                                   $schooId = $item->schoolOrigin_id;
                          }                          
                       }

                       $mod = $modal->where('modalityName','=',$data[21]);

                       if($mod->count() > 0){
                          foreach ($mod as $item) {
                                   $modId = $item->modality_id;
                          }                          
                       }

                       $enterp = $enterprise->where('companyName','=',$data[22]);

                       $dataEnterprise  = array();
                       if($enterp->count() > 0){
                          foreach ($enterp as $item) {
                                   $dataEnterprise[0] = $item->enterprise_id;                                   
                                   $dataEnterprise[1] = $item->representativeName;
                                   $dataEnterprise[2] = $item->representativePosition;
                                   $dataEnterprise[3] = $item->companyName;
                                   $dataEnterprise[4] = $item->businessAdvisorName;
                          }                          
                       }

                       $adv = $advisor->where('nameAcademicAdvisor','=',$data[23]);

                       if($adv->count() > 0){
                          foreach ($adv as $item) {
                                   $advId = $item->academicAdvisor_id;
                          }                          
                       }

                       $edit = $editor->where('nameEditorialAdvisor','=',$data[24]);

                       if($edit->count() > 0){
                          foreach ($edit as $item) {
                                   $editId = $item->editorialAdvisor_id;
                          }                          
                       }

                       $link = $linking->where('nameResponsible','=',$data[25]);

                       if($link->count() > 0){
                          foreach ($link as $item) {
                                   $linkId = $item->responsibleLinking_id;
                          }                          
                       }

                       $acaDir = $academicDir->where('nameDirector','=',$data[27]);
                       if($acaDir->count() > 0){
                          foreach ($acaDir as $item) {
                                   $acaDirId = $item->academicDirector_id;
                          }                          
                       }

                       $identifica = str_replace(" ","",$data[13]);
                       echo $data[0];
                       echo "<br>";
                       #Add user
                       $password = $this->generarCodigo();
                       echo $password;
                       echo "<br>";                       
                       $tmpEmail = explode('@',$data[17]);
                       $user = new User;
                       $user->name = $data[0]." ".$data[1]." ".$data[2];
                       $user->email = $tmpEmail[0].".".$identifica."@".$tmpEmail[1];
                       $user->password = Hash::make($password);
                       $user->save();
                       $insertId = $user->id;
                       #Add students;
                       $student = new Student;
                       $student->user_id = $insertId;
                       $student->institution_id = $data[31];
                       $student->period_id = $perId;
                       $student->name = $data[0];
                       $student->lastName = $data[1];
                       $student->motherLastNames = $data[2];
                       $student->dateOfBirth = $data[4];
                       $student->enrollment = $data[5];
                       $student->quarter_id = $quartId;
                       $student->socialSecurityNumber = $data[9];
                       $student->accidentInsurance = $data[10];
                       $student->educativeProgram_id = $programEducativeId;
                       $student->outOfTime = $data[14];
                       $student->schoolOrigin_id = $schooId;
                       $student->curp = $data[16];
                       $student->institutionalEmail = $data[17];
                       $student->incomeYear = $data[19];
                       $student->modality_id = $modId;
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
                       $document->nameRectorUniversity = $data[26];
                       $document->presentationDate = $data[29];
                       $document->releaseDate = $data[30];
                       $document->startDate = $data[11];
                       $document->endDate = $data[12];
                       $document->hoursStay = $data[18];
                       $document->academicDirector_id = $acaDirId;
                       $document->academicAdvisor_id = $advId;                       
                       $document->editorialAdvisor_id = $editId;
                       $document->responsibleLinking_id = $linkId;
                       $document->save();
                       $registrado++;
                    }
                 }
                 if(is_null($data[0])){
                    break;
                 }
              $fila++;
        }
        echo "Registros: ".$registrado."<br>";
        return $collection;
    }

    public function generarCodigo($longitud = 8) {
             $key = '';
             $pattern = '123456789';
             $max = strlen($pattern)-1;
             for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
             return $key;
    }
}
