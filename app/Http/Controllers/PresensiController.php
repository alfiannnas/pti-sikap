<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class PresensiController extends Controller
{
    public function create(){
        $hariini = date('Y-m-d');
        $nik = Auth::guard('karyawan')->user()->nik;
        $data = DB::table('presensi')->where('tgl_presensi', $hariini)->where('nik', $nik)->count();
        return view('presensi.presensi', compact('data'));
    }

    public function store(Request $request){
        $nik = Auth::guard('karyawan')->user()->nik;
        $tgl_presensi = date('Y-m-d');
        $jam = date("H:i:s");
        $lokasi = $request->lokasi;
        // -5.401331034301522, 105.27755498418226
        // -5.401350545264577, 105.27755049130218
        $latitudekantor = -5.401350545264577; 
        $longitudekantor = 105.27755049130218;
        $location = explode(',', $lokasi);
        $latitude = $location[0];
        $longitude = $location[1];

        $jarak = $this->distance($latitudekantor, $longitudekantor, $latitude, $longitude);
        $radius = round($jarak['meters']);

        $cek = DB::table('presensi')->where('tgl_presensi', $tgl_presensi)->where('nik', $nik)->count();

        if($cek > 0){
            $ket = 'out';
        }else{
            $ket = 'in';
        }
        $image = $request->image;   
        $folderPath = 'public/uploads/absensi/' . $nik . '/';
        $formatName = $nik . "-" . $tgl_presensi . '-' . $ket;
        $image_parts = explode(';base64', $image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName . ".png";
        $file = $folderPath . $fileName;
        
        if($radius > 20){
            echo "Radius_Error|Anda Berada di Luar Radius";
        }else{
            if ($cek > 0){
                if($jam < "17:00"){
                    echo "Error|Belum Jam Pulang";
                }else{
                $data_pulang = [
                    'jam_out' => $jam,
                    'foto_out' => $fileName,
                    'location' => $lokasi 
                ];
                $update = DB::table('presensi')->where('tgl_presensi', $tgl_presensi)->where('nik', $nik)->update($data_pulang);
                if($update){
                    echo "Success|Sucess, Selamat Pulang";
                    Storage::put($file, $image_base64);
                }else{
                    echo "Error|Gagal absen";
                }
            }
            }else{
            $data = [
                'nik' => $nik,
                'tgl_presensi' => $tgl_presensi,
                'jam_in' => $jam,
                'foto_in' => $fileName,
                'location' => $lokasi 
            ];
            $simpan = DB::table('presensi')->insert($data);
            if($simpan){
                echo "Success|Sucess, Selamat Masuk";
                Storage::put($file, $image_base64);
            }else{
                echo "Error|Gagal absen";
            }
        }
        }
    }

    function distance($lat1, $lon1, $lat2, $lon2){
        $theta = $lon1 - $lon2;
        $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $miles = $miles * 60 * 1.1515;
        $feet = $miles * 5280;
        $yards = $feet / 3;
        $kilometers = $miles * 1.609344;
        $meters = $kilometers * 1000;
        return compact('meters');
    }
}
