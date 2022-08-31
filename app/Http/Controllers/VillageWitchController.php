<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VillageWitch;
use App\Helpers\Helper;
use Validate;
class VillageWitchController extends Controller
{
    public function index(){

        $data['name'] = Helper::appName();
        $data['row']  = VillageWitch::orderBy('id','desc')->get();
        return view('index',$data);
    }

    public function store(Request $request){
        $request->validate([
            'usia_kematian_a'   => 'required|numeric',
            'tahun_kematian_a'  => 'required|numeric',
            'usia_kematian_b'   => 'required|numeric',
            'tahun_kematian_b'  => 'required|numeric',
        ]);

        $check = VillageWitch::saveData($request);

        if($check){
            return redirect()->back()->with('message','success save data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed save data')->with('message_type','danger');
        }
    }

    public function update(Request $request){
        $request->validate([
            'id'                =>'required',
            'usia_kematian_a'   => 'required|numeric',
            'tahun_kematian_a'  => 'required|numeric',
            'usia_kematian_b'   => 'required|numeric',
            'tahun_kematian_b'  => 'required|numeric',
        ]);

        $check = VillageWitch::updateData($request);

        if($check){
            return redirect()->back()->with('message','success update data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed update data')->with('message_type','danger');
        }
    }

    public function destroy($id){
        $delete=VillageWitch::where('id',$id)->delete();

        if($delete){
            return redirect()->back()->with('message','success delete data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed delete data')->with('message_type','danger');
        }
    }
}
