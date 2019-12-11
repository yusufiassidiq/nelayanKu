<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataTangkapan extends Model
{
    protected $table = 'datatangkapan';

    protected $fillable = ['umurnelayan','jenisnelayan','tempatpendaratanikan','nelayan','jenis','jumlah','jeniskapal','alattangkap','dpi','tanggal'];
}
