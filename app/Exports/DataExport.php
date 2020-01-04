<?php

namespace App\Exports;

use App\DataTangkapan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DataExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataTangkapan::all();
    }

    public function headings(): array
    { 
        return ['Nomor',
                'Nelayan',
                'Umur Nelayan',
                'Jenis Nelayan',
                'Jenis Ikan',
                'Jumlah',
                'Bobot',
                'Alat Tangkap',
                'Jenis Kapal',
                'Nama Kapal',
                'Nomor Kapal',
                'Jumlah ABK',
                'Daerah Penangkapan Ikan',
                'Tanggal Penangkapan',
                'Tempat Pendaratan Ikan',
                'Created at',
                'Updated at',
    ];
    }
}
