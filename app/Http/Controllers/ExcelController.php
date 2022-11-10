<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ExcelImport;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use App\Models\Flight;

class ExcelController extends Controller
{
    public function index(){
        $data['title'] = 'Import Excel';
        $data['row'] = Flight::paginate(20);
        $data['total']= Flight::count();
        return view('excel.import',$data);
    }

    public function delete(){
        
        $check = Flight::truncate();

        return redirect()->back()->with('message', 'success delete all data !')->with('message_type','primary');
    }

    public function import(Request $request) 
    {
        $request->validate([
            'excel'   => 'required|file'
        ]);

        Excel::import(new ExcelImport, $request->file('excel'));
        
        return redirect()->back()->with('message', 'All good!')->with('message_type','primary');
    }
}
