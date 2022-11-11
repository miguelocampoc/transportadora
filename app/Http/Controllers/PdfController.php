<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\Ley;
use App\Models\Conductor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    public function index($id) 
    {

        $data = DB::table('conductores')->join('ley','conductores.id','=','ley.id_conductor')->first();

        //return view("ley.pdf",['data' => $data]);
       
        $pdf = PDF::loadView('ley.pdf', [
          'data' =>$data
        ]);
       
        return $pdf->download('ley.pdf');
        
    }
}
