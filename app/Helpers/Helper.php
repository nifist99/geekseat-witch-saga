<?php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
 
class Helper {
    public static function appName() {
        return "GeekSeat Witch Saga";
    }

    public static function geometri($usia_a,$tahun_a,$usia_b,$tahun_b){
        $tahun_kematian_a = $tahun_a - $usia_a;
        $tahun_kematian_b = $tahun_b - $usia_b;

        if($tahun_kematian_a <1 or $tahun_kematian_b<1){
            return -1;
        }else{
            // rumus Un = 1 + n/2 (n-1)
            $year_of_death_a = 1 + (($tahun_kematian_a/2)*($tahun_kematian_a-1));

            $year_of_death_b = 1 + (($tahun_kematian_b/2)*($tahun_kematian_b-1));

            $result = ($year_of_death_a+$year_of_death_b)/2;

            return $result;
        }
    }

    public static function Un($usia,$tahun){

        $tahun_kematian = $tahun - $usia;

        if($tahun_kematian <1){
            return [
                "tahun"=>$tahun_kematian,
                "kematian"=>-1,
            ];
        }else{
            // rumus Un = 1 + n/2 (n-1)
            $year_of_death = 1 + (($tahun_kematian/2)*($tahun_kematian-1));

            return [
                "tahun"=>$tahun_kematian,
                "kematian"=>$year_of_death,
            ];
        }

    }
}