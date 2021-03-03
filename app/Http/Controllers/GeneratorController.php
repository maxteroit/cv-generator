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
        
        header('Content-Disposition: attachment; filename=3row4column.docx');
        $processor->saveAs('php://output');
    }
}
