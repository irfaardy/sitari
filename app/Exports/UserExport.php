<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;

class UserExport implements FromView,ShouldAutoSize,WithEvents
{
    private $group;
    private $data;
    public function registerEvents(): array
    {
         return [
            AfterSheet::class    => function(AfterSheet $event) {
               $event->sheet->setAllBorders('thin');
            },
        ];
    }
    public function __construct($group,$data)
    {
        $this->group = $group;
        $this->data = $data;
    }
    public function view(): View
    {
        return view('exports.user_export', [
            'data' => $this->data,
            'group' => $this->group,
        ]);
    }
}
