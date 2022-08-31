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

        return view('index',$data);
    }

    public function store(Request $request){
        $request->validate([
            'usia_kematian_a'   => 'required|number',
            'tahun_kematian_a'  => 'required|number',
            'usia_kematian_b'   => 'required|number',
            'tahun_kematian_b'  => 'required|number',
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
            'usia_kematian_a'   => 'required|number',
            'tahun_kematian_a'  => 'required|number',
            'usia_kematian_b'   => 'required|number',
            'tahun_kematian_b'  => 'required|number',
        ]);

        $check = VillageWitch::updateData($request);

        if($check){
            return redirect()->back()->with('message','success update data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed update data')->with('message_type','danger');
        }
    }
}
