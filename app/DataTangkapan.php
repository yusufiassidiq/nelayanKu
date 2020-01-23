<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataTangkapan extends Model
{
    protected $table = 'datatangkapan';

    protected $fillable = ['umurnelayan','jenisnelayan','jenisIkanLainnya','namakapal','nokapal','jumlahABK','tempatpendaratanikan','nelayan','jenis','jumlah','bobot','jeniskapal','alattangkap','dpi','tanggal'];
}
