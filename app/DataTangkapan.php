<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataTangkapan extends Model
{
    protected $table = 'datatangkapan';

    protected $fillable = ['umurnelayan','jenisnelayan','namakapal','nokapal','jumlahABK','tempatpendaratanikan','nelayan','jenisTCT','hargaTCT','bobotTCT','kategori','jeniskapal','alattangkap','dpi','tanggal'];
}
