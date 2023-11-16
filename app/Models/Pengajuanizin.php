<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuanizin extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_izin';

    public function permittedOnDay($tahun, $bulan, $day, $nik) {
        return $this->whereDate('tgl_izin', '=', "$tahun-$bulan-$day")
        ->where('nik', $nik)
        ->where('status_approved', 1)
        ->exists();
    }
}
