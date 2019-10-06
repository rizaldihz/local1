<?php

namespace App\Exports;

use App\Production;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
     * @return Builder
     */

    use Exportable;

    public function collection()
    {
        return collect([
            [
                'Wilayah Kerja' =>  'Cepu',
                'Produksi Oil' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 1)
                    ->sum('productions.produksi_minyak'),
                'Produksi Gas' =>  DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 1)
                    ->sum('productions.produksi_gas'),
                'Produksi Water'=> DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 1)
                    ->sum('productions.produksi_air'),
                'Fuel Gas' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 1)
                    ->sum('productions.fuel_gas'),
                'Flare' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 1)
                    ->sum('productions.flare'),
                'Injeksi Gas' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 1)
                    ->sum('productions.injeksi_gas'),
                'Injeksi Water' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 1)
                    ->sum('productions.injeksi_air')
            ],
            [
                'Wilayah Kerja' =>  'Madura Offshore',
                'Produksi Oil' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 2)
                    ->sum('productions.produksi_minyak'),
                'Produksi Gas' =>  DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 2)
                    ->sum('productions.produksi_gas'),
                'Produksi Water'=> DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 2)
                    ->sum('productions.produksi_air'),
                'Fuel Gas' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 2)
                    ->sum('productions.fuel_gas'),
                'Flare' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 2)
                    ->sum('productions.flare'),
                'Injeksi Gas' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 2)
                    ->sum('productions.injeksi_gas'),
                'Injeksi Water' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 2)
                    ->sum('productions.injeksi_air')
            ],
            [
                'Wilayah Kerja' =>  'Kangean',
                'Produksi Oil' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 3)
                    ->sum('productions.produksi_minyak'),
                'Produksi Gas' =>  DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 3)
                    ->sum('productions.produksi_gas'),
                'Produksi Water'=> DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 3)
                    ->sum('productions.produksi_air'),
                'Fuel Gas' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 3)
                    ->sum('productions.fuel_gas'),
                'Flare' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 3)
                    ->sum('productions.flare'),
                'Injeksi Gas' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 3)
                    ->sum('productions.injeksi_gas'),
                'Injeksi Water' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 3)
                    ->sum('productions.injeksi_air')
            ],
            [
                'Wilayah Kerja' =>  'Ketapang',
                'Produksi Oil' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 4)
                    ->sum('productions.produksi_minyak'),
                'Produksi Gas' =>  DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 4)
                    ->sum('productions.produksi_gas'),
                'Produksi Water'=> DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 4)
                    ->sum('productions.produksi_air'),
                'Fuel Gas' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 4)
                    ->sum('productions.fuel_gas'),
                'Flare' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 4)
                    ->sum('productions.flare'),
                'Injeksi Gas' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 4)
                    ->sum('productions.injeksi_gas'),
                'Injeksi Water' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 4)
                    ->sum('productions.injeksi_air')
            ],
            [
                'Wilayah Kerja' =>  'WMO',
                'Produksi Oil' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 5)
                    ->sum('productions.produksi_minyak'),
                'Produksi Gas' =>  DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 5)
                    ->sum('productions.produksi_gas'),
                'Produksi Water'=> DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 5)
                    ->sum('productions.produksi_air'),
                'Fuel Gas' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 5)
                    ->sum('productions.fuel_gas'),
                'Flare' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 5)
                    ->sum('productions.flare'),
                'Injeksi Gas' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 5)
                    ->sum('productions.injeksi_gas'),
                'Injeksi Water' => DB::table('productions')
                    ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                    ->where('productions.wilayah_kerja_id', '=', 5)
                    ->sum('productions.injeksi_air')
            ],
            [
                'Wilayah Kerja' =>  'TOTAL',
                'Produksi Oil' => DB::table('productions')
                    ->sum('productions.produksi_minyak'),
                'Produksi Gas' =>  DB::table('productions')
                    ->sum('productions.produksi_gas'),
                'Produksi Water'=>  DB::table('productions')
                    ->sum('productions.produksi_air'),
                'Fuel Gas' =>DB::table('productions')
                    ->sum('productions.fuel_gas'),
                'Flare' => DB::table('productions')
                    ->sum('productions.flare'),
                'Injeksi Gas' => DB::table('productions')
                    ->sum('productions.injeksi_gas'),
                'Injeksi Water' => DB::table('productions')
                    ->sum('productions.injeksi_air')
            ]
        ]);
    }

    public function headings(): array
    {
        return [
            'Wilayah Kerja',
            'Produksi Oil',
            'Produksi Gas',
            'Produksi Water',
            'Fuel Gas',
            'Flare',
            'Injeksi Gas',
            'Injeksi Water'
        ];
    }
}
