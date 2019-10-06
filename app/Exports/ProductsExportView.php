<?php

namespace App\Exports;

use App\Production;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductsExportView implements FromView
{
    /**
     * @return View
     */

    public function __construct(int $wilayah)
    {
        $this->wilayah = $wilayah;
    }

    public function view(): View
    {
        return view('Production.table',[
            'production' => Production::where('wilayah_kerja_id','=',$this->wilayah)->get()
        ]);
    }
}
