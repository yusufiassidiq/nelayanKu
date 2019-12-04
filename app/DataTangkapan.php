<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataTangkapan extends Model
{
    protected $table = 'datatangkapan';

    protected $fillable = ['tempatpendarataniklan','nelayan','jenis','jumlah','jeniskapal','alattangkap','dpi','tanggal'];
}
