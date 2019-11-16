<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataTangkapan extends Model
{
    protected $table = 'datatangkapan';

    protected $fillable = ['nelayan','jenis','jumlah'];
}
