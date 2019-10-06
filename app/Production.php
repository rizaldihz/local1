<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    public function wilayahkerja()
    {
        return $this->belongsTo('App\WilayahKerja');
    }
    protected $fillable = [
        'tanggal',
        'wilayah_kerja_id',
        'produksi_minyak',
        'produksi_gas',
        'fuel_gas',
        'flare',
        'injeksi_gas',
        'produksi_air',
        'injeksi_air'
    ];
    public $timestamps = false;
}
