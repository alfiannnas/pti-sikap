<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'setting';
    protected $primaryKey = 'id';
    public $timestamps = false; // Add this line

    protected $fillable = [
        'longitude',
        'latitude',
        'jam_masuk',
        'jam_keluar',
    ];
}
