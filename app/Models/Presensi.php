<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presensi extends Model
{
    use HasFactory;
    protected $table = 'presensi';
    protected $primaryKey = 'id';

    public function attendedOnDay($tahun, $bulan, $day, $nik) {
        $gps = DB::table('setting')->select('latitude', 'longitude', 'jam_masuk', 'jam_keluar')->first();
        return $this->whereDate('tgl_presensi', '=', "$tahun-$bulan-$day")
        ->where('nik', $nik)
        ->where('jam_in', '<=', $gps->jam_masuk)
        ->where('jam_out', '<>', '')
        ->exists();
    }

    public function lateOnDay($tahun, $bulan, $day, $nik) {
        $gps = DB::table('setting')->select('latitude', 'longitude', 'jam_masuk', 'jam_keluar')->first();
        return $this->whereDate('tgl_presensi', '=', "$tahun-$bulan-$day")
        ->where('nik', $nik)
        ->where('jam_in', '>', $gps->jam_masuk)
        ->where('jam_out', '<>', '')
        ->exists();
    }
}
