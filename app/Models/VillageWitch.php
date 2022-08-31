<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helper;

class VillageWitch extends Model
{
    use HasFactory;
    protected $table = 'village';

    protected $fillable = [
        'usia_kematian_a',
        'tahun_kematian_a',
        'usia_kematian_b',
        'tahun_kematian_b',
        'result',
    ];

    public static function saveData($request){
        $save = VillageWitch::create([
            "usia_kematian_a"   =>$request->usia_kematian_a,
            "tahun_kematian_a"  =>$request->tahun_kematian_a,
            "usia_kematian_b"   =>$request->usia_kematian_b,
            "tahun_kematian_b"  =>$request->tahun_kematian_b,
            "result"            =>Helper::geometri($request->usia_kematian_a,$request->tahun_kematian_a,$request->usia_kematian_b,$request->tahun_kematian_b),
        ]);

        return $save;
    }

    public static function updateData($request){
        $update = VillageWitch::where('id',$request->id)->update([
            "usia_kematian_a"   =>$request->usia_kematian_a,
            "tahun_kematian_a"  =>$request->tahun_kematian_a,
            "usia_kematian_b"   =>$request->usia_kematian_b,
            "tahun_kematian_b"  =>$request->tahun_kematian_b,
            "result"            =>Helper::geometri($request->usia_kematian_a,$request->tahun_kematian_a,$request->usia_kematian_b,$request->tahun_kematian_b),
        ]);

        return $update;
    }
}
