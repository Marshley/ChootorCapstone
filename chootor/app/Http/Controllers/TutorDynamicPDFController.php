<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;
use PDF;
use App\User;

class TutorDynamicPDFController extends Controller
{
    function index()
    {
     $tutor_data = $this->get_tutor_data();
     return view('admin.tutor_dynamic_pdf')->with('tutor_data', $tutor_data);
    }

    function get_tutor_data()
    {
     $tutor_data = User::where('user_type','tutor')
         ->limit(10)
         ->get();
     return $tutor_data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_tutor_data_to_html())->setPaper('a4', 'landscape');
     return $pdf->stream();
    }

    function convert_tutor_data_to_html()
    {
     $tutor_data = $this->get_tutor_data();
     $output = '
     <h3 align="center">Tutor Data</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Lastname</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Firstname</th>
    <th style="border: 1px solid; padding:12px;" width="15%">MI</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Course</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Email</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Rate</th>
   </tr>
     ';  
     foreach($tutor_data as $tutor)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$tutor->lastname.'</td>
       <td style="border: 1px solid; padding:12px;">'.$tutor->firstname.'</td>
       <td style="border: 1px solid; padding:12px;">'.$tutor->middleinitial.'</td>
       <td style="border: 1px solid; padding:12px;">'.$tutor->course->course_name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$tutor->email.'</td>
       <td style="border: 1px solid; padding:12px;">'.$tutor->rate.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}
