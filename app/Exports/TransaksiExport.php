<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;

class TransaksiExport implements FromView,ShouldAutoSize,WithEvents
{
    private $transaksi_data;
    private $range;
    private $status;
    public function registerEvents(): array
    {
         return [
            AfterSheet::class    => function(AfterSheet $event) {
               $event->sheet->setAllBorders('thin');
            },
        ];
    }
    public function __construct($transaksi_data,$range,$status)
    {
        $this->transaksi_data = $transaksi_data;
        $this->range = $range;
        $this->status = $status;
    }
    public function view(): View
    {
        return view('exports.transaksi', [
            'transaksi' => $this->transaksi_data,
            'range' => $this->range,
            'status' => $this->status
        ]);
    }
}
