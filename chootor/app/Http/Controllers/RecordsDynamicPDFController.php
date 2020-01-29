<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Booking;

class RecordsDynamicPDFController extends Controller
{
    function index()
    {
     $records_data = $this->get_records_data();
     return view('admin.dynamic_pdf')->with('records_data', $records_data);
    }

    function get_records_data()
    {
     $records_data = Booking::limit(10)
         ->get();
     return $records_data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_records_data_to_html())->setPaper('a4', 'landscape');
     return $pdf->stream();
    }

    function convert_records_data_to_html()
    {
     $records_data = $this->get_records_data();
     $output = '
     <h3 align="left">Data Records</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Tutee Name</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Tutor Name</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Status</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Subject</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Time</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Location</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Rate/hr</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Rating</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Comment</th>
   </tr>
     ';  
     foreach($records_data as $record)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$record->tutee->firstname. ' '.$record->tutee->lastname.' ' .$record->tutee->middleinitial.'</td>
       <td style="border: 1px solid; padding:12px;">'.$record->schedule->tutor->firstname.' ' . $record->schedule->tutor->lastname. ' ' .$record->schedule->tutor->middleinitial.'</td>
       <td style="border: 1px solid; padding:12px;">'.$record->status.'</td>
       <td style="border: 1px solid; padding:12px;">'.$record->schedule->subject->name. ' '.$record->subtopic.'</td>
       <td style="border: 1px solid; padding:12px;">'.$record->schedule->start_time. ' '.$record->schedule->end_time.'</td>
       <td style="border: 1px solid; padding:12px;">'.$record->schedule->location->name.'</td>
       <td style="border: 1px solid; padding:12px;">'. 'Php ' .$record->schedule->tutor->rate.'.00' .'</td>
       <td style="border: 1px solid; padding:12px;">'.$record->rate.'/5'.'</td>
       <td style="border: 1px solid; padding:12px;">'.$record->comment.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}
