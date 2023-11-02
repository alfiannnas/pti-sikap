<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Pengajuanizin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

use PDF;

// use Barryvdh\DomPDF\Facade as PDF;
// use Barryvdh\DomPDF\PDF as DomPDFPDF;

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
        // -6.223910949538835, 106.64876614782546
        //-6.224833003263079, 106.6498009576709
        // -6.397327086594367, 106.83687347311667
        //-6.397319890760971, 106.83686828415709
        // -5.401331034301522, 105.27755498418226 rumah default
        // -5.396866794639903, 105.27792672028814 gg saleh
        $latitudekantor = -5.396866794639903; 
        $longitudekantor =  105.27792672028814;
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
                if($jam < "10:00"){
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

    public function izin()
    {
        $bulanini = date('m') * 1;
        $tahunini = date('Y');
        $nik = Auth::guard('karyawan')->user()->nik;
        $dataizin = DB::table('pengajuan_izin')
            ->where('nik',$nik)
            ->whereRaw('MONTH(tgl_izin)="' . $bulanini . '"')
            ->whereRaw('YEAR(tgl_izin)="' . $tahunini . '"')
            ->get();
        return view('presensi.izin', compact('dataizin'));
    }

    public function buatizin()
    {
        
        return view('presensi.buatizin');
    }

    public function storeizin(Request $request)
    {
        $nik = Auth::guard('karyawan')->user()->nik;
        $tgl_izin = $request->tgl_izin;
        $status = $request->status;
        $keterangan = $request->keterangan;

        $data = [
            'nik' => $nik,
            'tgl_izin' => $tgl_izin,
            'status' => $status,
            'keterangan' => $keterangan,
        ];

        $simpan = DB::table('pengajuan_izin')->insert($data);

        if ($simpan) {
            return redirect('/presensi/izin')->with(['succes' => 'Data Berhasil Disimpan']);
        } else {
            return redirect('/presensi/izin')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    public function suratcuti($id)
    {
        // Ambil data Pengajuanizin berdasarkan ID
        $pengajuanizin = Pengajuanizin::find($id);

        if ($pengajuanizin) {
            $date = Carbon::parse(date('Y-m-d'))->format('j F Y');

            $nama = Auth::guard('karyawan')->user()->nama;
            $nik = Auth::guard('karyawan')->user()->nik;
            $jabatan = Auth::guard('karyawan')->user()->jabatan;

            $data = [
                'date' => $date,
                'pengajuanizin' => $pengajuanizin,
                'nama' => $nama,
                'nik' => $nik,
                'jabatan' => $jabatan
            ];

            $pdf = PDF::loadView('presensi.suratcuti', $data);
            $pdf->setPaper('A4', 'portrait');
            return $pdf->download('suratcuti.pdf');
        } else {
            return "Izin tidak ditemukan."; // Tampilkan pesan jika izin tidak ditemukan
        }
    }

}
