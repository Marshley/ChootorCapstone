<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;
use PDF;
use App\User;

class TuteeDynamicPDFController extends Controller
{
    function index()
    {
     $tutee_data = $this->get_tutee_data();
     return view('admin.tutee_dynamic_pdf')->with('tutee_data', $tutee_data);
    }

    function get_tutee_data()
    {
     $tutee_data = User::where('user_type','tutee')
         ->limit(10)
         ->get();
     return $tutee_data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_tutee_data_to_html())->setPaper('a4', 'landscape');
     return $pdf->stream();
    }

    function convert_tutee_data_to_html()
    {
     $tutee_data = $this->get_tutee_data();
     $output = '
     <h3 align="center">Tutee Data</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Lastname</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Firstname</th>
    <th style="border: 1px solid; padding:12px;" width="15%">MI</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Course</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Email</th>
   </tr>
     ';  
     foreach($tutee_data as $tutee)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$tutee->lastname.'</td>
       <td style="border: 1px solid; padding:12px;">'.$tutee->firstname.'</td>
       <td style="border: 1px solid; padding:12px;">'.$tutee->middleinitial.'</td>
       <td style="border: 1px solid; padding:12px;">'.$tutee->course->course_name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$tutee->email.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}
