<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PresensiExport implements FromView,ShouldAutoSize
{
    private $presensi_data;
    private $range;
    
    public function __construct($presensi_data,$range)
    {
        $this->presensi_data = $presensi_data;
        $this->range = $range;
    }
    public function view(): View
    {
        return view('exports.presensi', [
            'presensi' => $this->presensi_data,
            'range' => $this->range
        ]);
    }
}
