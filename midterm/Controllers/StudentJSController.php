<?php

namespace App\Http\Controllers;

use App\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentJSController extends Controller
{
    public function index(){
        $researcher = DB::table('student')
        ->select(DB::raw('weight'), DB::raw("f_name"))
        ->where('f_name',   '<>', 10  )
        ->get();
 
        $data = [];
 
         foreach($researcher as $row){
             $data['label'][] = $row->f_name;

             $data['data'][] = (int)$row->weight;

         }
         $data['chart_data'] = json_encode($data);
         return view('studentJS',$data);
         
 
 
     }
     
 }
