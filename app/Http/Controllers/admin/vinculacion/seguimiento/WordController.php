<?php

namespace App\Http\Controllers\admin\vinculacion\seguimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($doc)
    {

        if($doc == 1){
           $file = storage_path('app/carta_presentacion.docx');
        }else if($doc ==2){
                 $file = storage_path('app/carta_liberacion.docx');
        }

        $information = Auth::user();

        $representativeName = $information->student->document->representativeName;
        $representativePosition = $information->student->document->representativePosition;
        $companyName = $information->student->document->companyName;

        $name = $information->student->name." ".$information->student->lastName." ".$information->student->motherLastNames;
        $enrollment = $information->student->enrollment;
        $nss = $information->student->socialSecurityNumber;
        $presDate = $information->student->document->presentationDate;
        $hour = $information->student->document->hoursStay;
        $advisor = $information->student->document->advisor->nameAcademicAdvisor;
        $academicPosition = $information->student->document->advisor->academicPosition;      

        $academicDirector = $information->student->document->director->nameDirector;
        $academicDivision = $information->student->document->director->division->nameDivision;       
        $editor = $information->student->document->editor->nameEditorialAdvisor;
        $editorialPosition = $information->student->document->editor->editorialPosition;
        $link = $information->student->document->link->nameResponsible;
        $responsiblePosition = $information->student->document->link->responsiblePosition;        
        $businessAdvisor = $information->student->document->businessAdvisor;
        $educativeProgram = $information->student->program->displayName;


        setlocale (LC_TIME, "es_MX.UTF-8");      
        $presentationDate = "Chetumal, Quintana Roo, a ";
        $presentationDate .=strftime('%d de %B de %Y', strtotime($information->student->document->presentationDate));
        $releaseDate = "Chetumal, Quintana Roo, a ";
        $releaseDate .=strftime('%d de %B de %Y', strtotime($information->student->document->releaseDate));         
        $startDate = strftime('%d de %B de %Y', strtotime($information->student->document->startDate));;
        $endDate = strftime('%d de %B de %Y', strtotime($information->student->document->endDate));;

        try{
            $template = new \PhpOffice\PhpWord\TemplateProcessor($file);
            if($doc == 1){
                $tmpFile = $template->setValue('presentationDate',$presentationDate);            
                $tmpFile = $template->setValue('name',$name);
                $tmpFile = $template->setValue('enrollment',$enrollment);
                $tmpFile = $template->setValue('socialSecurityNumber',$nss);
                $tmpFile = $template->setValue('hours',$hour);
                $tmpFile = $template->setValue('advisor',$advisor);            
                $tmpFile = $template->setValue('representativeName',$representativeName);
                $tmpFile = $template->setValue('representativePosition',$representativePosition);
                $tmpFile = $template->setValue('companyName',$companyName);
                $tmpFile = $template->setValue('presentationDate',$presentationDate);
                $tmpFile = $template->setValue('startDate',$startDate);
                $tmpFile = $template->setValue('endDate',$endDate);
            }else if($doc == 2){
                     $tmpFile = $template->setValue('releaseDate',$releaseDate);                 
                     $tmpFile = $template->setValue('nameDirector',$academicDirector);
                     $tmpFile = $template->setValue('academicDivision',$academicDivision);                                
                     $tmpFile = $template->setValue('name',$name);
                     $tmpFile = $template->setValue('educativeProgram',$educativeProgram);                     
                     $tmpFile = $template->setValue('startDate',$startDate);
                     $tmpFile = $template->setValue('endDate',$endDate);
                     $tmpFile = $template->setValue('hours',$hour);
                     $tmpFile = $template->setValue('companyName',$companyName);                     
                     $tmpFile = $template->setValue('businessAdvisor',$businessAdvisor);                             
                     $tmpFile = $template->setValue('academicAdvisor',$advisor);
                     $tmpFile = $template->setValue('academicPosition',$academicPosition);
                     $tmpFile = $template->setValue('nameResponsible',$link);
                     $tmpFile = $template->setValue('responsiblePosition',$responsiblePosition);
                     $tmpFile = $template->setValue('nameEditorialAdvisor',$editor);
                     $tmpFile = $template->setValue('editorialPosition',$editorialPosition);

            }

            $tmpFile = tempnam(sys_get_temp_dir(),'PHPWord');
            $template->saveAs($tmpFile);
            $archivo = md5(time()).".docx";

            $headers = ["Content-Type: application/octet-stream"];
            return response()->download($tmpFile,$archivo,$headers)->deletefileAfterSend(true);

        }catch(\PhpOffice\PhpWord\Exception\Exception $e){
               dd($e->getCode());
        }

       // \Storage::disk('local')->put("editado.docx", $template->saveAs('editado.docx'));
        //return Response::download($file);
        /*header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document"); 
        header('Content-Disposition: attachment; filename=' . $file);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($template, 'Word2007');
        $objWriter->save('php://output');  */     
                //$objWriter->save('php://output');
               //$template->saveAs($file);
              //  header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document"); 
        //header('Content-Disposition: attachment; filename=editado.docx');
        //$template->saveAs('editado.docx');
        //$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        //$objWriter->save('php://output');        
        //$objWriter->save('php://output');

        /*$phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $text = $section->addText("Hola desde Word");
        $filename = "archivo.docx";
        header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document"); 
        header('Content-Disposition: attachment; filename=' . $filename);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('php://output');*/

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
