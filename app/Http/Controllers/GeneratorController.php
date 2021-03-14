<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneratorController extends Controller
{
    public function index(){
        return view('generator.index');
    }

    public function generate(Request $request){
        $template = storage_path('3row4column.docx');
        $processor = new \PhpOffice\PhpWord\TemplateProcessor($template);
        $processor->setValues(array(
            'first_name' => ucwords($request->first_name),
            'last_name' => ucwords($request->last_name),
            'phone_number' => ucwords($request->phone_number),
            'email' => ucwords($request->email),
            'description' => ucwords($request->description),
        ));
        
        //header('Content-Disposition: attachment; filename=3row4column.docx');
        $file_path = storage_path('app\public\\'.$_COOKIE['file']);
        $processor->saveAs($file_path.'.docx');

        setcookie('hasUploaded', 1);

        $domPdfPath = base_path('vendor/tecnickcom/tcpdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('TCPDF');
         
        //Load word file
        $Content = \PhpOffice\PhpWord\IOFactory::load(storage_path('app/public/'.$_COOKIE['file'].'.docx')); 
 
        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save($file_path.'.pdf'); 
        unlink($file_path.'.docx');

        return redirect('/');
    }
}
