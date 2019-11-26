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
                'Jenis Ikan',
                'Jumlah',
                'Alat Tangkap',
                'Jenis Kapal',
                'Daerah Penangkapan Ikan',
                'Tanggal Penangkapan',
                'Created at',
                'Updated at',
    ];
    }
}
