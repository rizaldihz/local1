<?php
?>

<table id="tabReport" class="table table-striped table-responsive-stack">
    <thead>
    <tr>
        <th class="th-lg align-top">Wilayah Kerja</th>
        <th class="th-lg align-top">Produksi<div class="d-none d-md-inline"></div> <span class="badge bg-green">Oil</span><br/><span class="text-orange small"><small>BARREL OIL</small></span></th>
        <th class="th-lg align-top">Produksi<div class="d-none d-md-inline"></div> <span class="badge bg-red">Gas</span><br/><span class="text-orange small"><small>MMSCF</small></span></th>
        <th class="th-lg align-top">Produksi<div class="d-none d-md-inline"></div> <span class="badge bg-blue">Water</span><br/><span class="text-orange small"><small>BARREL WATER</small></span></th>
        <th class="th-lg align-top">Fuel Gas<br/><span class="text-orange small"><small>MMSCF</small></span></th>
        <th class="th-lg align-top">Flare<br/><span class="text-orange small"><small>MMSCF</small></span></th>
        <th class="th-lg align-top">Injeksi <span class="badge bg-red">Gas</span><br/><span class="text-orange small"><small>MMSCF</small></span></th>
        <th class="th-lg align-top">Injeksi <span class="badge bg-blue">Water</span><br/><span class="text-orange small"><small>BARREL WATER</small></span></th>
    </tr>
    </thead>
    <tbody>
    @php
        $i=0;
        $list = $data;
        $total['produksi_minyak'] = 0;
        $total['produksi_gas'] = 0;
        $total['produksi_air'] = 0;
        $total['fuel_gas'] = 0;
        $total['flare'] = 0;
        $total['injeksi_gas'] = 0;
        $total['injeksi_air'] = 0;
    @endphp
    @foreach ($data as $satuan)
        @php
            $i++;
            $key = key($list);
            next($list);
        @endphp
        <tr>
            {{-- @php
                $totMinyakCepu = DB::table('productions')
                                                ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                                ->where('productions.wilayah_kerja_id', '=', 1)
                                                ->sum('productions.produksi_minyak');
                                                //->whereBetween('date', [$date_from, $date_to]);
                $totGasCepu = DB::table('productions')
                                                ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                                ->where('productions.wilayah_kerja_id', '=', 1)
                                                ->sum('productions.produksi_gas');
                $totAirCepu = DB::table('productions')
                                                ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                                ->where('productions.wilayah_kerja_id', '=', 1)
                                                ->sum('productions.produksi_air');
                $totFuelGasCepu = DB::table('productions')
                                                ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                                ->where('productions.wilayah_kerja_id', '=', 1)
                                                ->sum('productions.fuel_gas');
                $totFlareCepu = DB::table('productions')
                                                ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                                ->where('productions.wilayah_kerja_id', '=', 1)
                                                ->sum('productions.flare');
                $totInjeksiGasCepu = DB::table('productions')
                                                ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                                ->where('productions.wilayah_kerja_id', '=', 1)
                                                ->sum('productions.injeksi_gas');
                $totInjeksiAirCepu = DB::table('productions')
                                                ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                                ->where('productions.wilayah_kerja_id', '=', 1)
                                                ->sum('productions.injeksi_air');
            @endphp --}}
            <td><a href="{{route('production.show',1)}}">{{$key}} <i class="fas fa-chart-line"></i></a>
                <a href="{{route('home.show',$i)}}"><i class="far fa-eye"></i></a></td>
            <td>{{round($satuan->sum('produksi_minyak'),2)}}</td>
            <td>{{round($satuan->sum('produksi_gas'),2)}}</td>
            <td>{{round($satuan->sum('produksi_air'),2)}}</td>
            <td>{{round($satuan->sum('fuel_gas'),2)}}</td>
            <td>{{round($satuan->sum('flare'),2)}}</td>
            <td>{{round($satuan->sum('injeksi_gas'),2)}}</td>
            <td>{{round($satuan->sum('injeksi_air'),2)}}</td>
        </tr>
        @php
            $total['produksi_minyak'] +=$satuan->sum('produksi_minyak');
            $total['produksi_gas'] +=$satuan->sum('produksi_gas');
            $total['produksi_air'] +=$satuan->sum('produksi_air');
            $total['fuel_gas'] +=$satuan->sum('fuel_gas');
            $total['flare'] +=$satuan->sum('flare');
            $total['injeksi_gas'] +=$satuan->sum('injeksi_gas');
            $total['injeksi_air'] +=$satuan->sum('injeksi_air');
        @endphp
    @endforeach
    {{-- <tr>
        @php
            $totMinyakCepu = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 1)
                                            ->sum('productions.produksi_minyak');
                                            //->whereBetween('date', [$date_from, $date_to]);
            $totGasCepu = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 1)
                                            ->sum('productions.produksi_gas');
            $totAirCepu = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 1)
                                            ->sum('productions.produksi_air');
            $totFuelGasCepu = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 1)
                                            ->sum('productions.fuel_gas');
            $totFlareCepu = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 1)
                                            ->sum('productions.flare');
            $totInjeksiGasCepu = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 1)
                                            ->sum('productions.injeksi_gas');
            $totInjeksiAirCepu = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 1)
                                            ->sum('productions.injeksi_air');
        @endphp
        <td><a href="{{route('production.show',1)}}">Cepu <i class="fas fa-chart-line"></i></a>
            <a href="{{route('home.show',1)}}"><i class="far fa-eye"></i></a></td>
        <td>{{round($data['Cepu']->sum('produksi_minyak'),2)}}</td>
        <td>{{round($data['Cepu']->sum('produksi_gas'),2)}}</td>
        <td>{{round($data['Cepu']->sum('produksi_air'),2)}}</td>
        <td>{{round($data['Cepu']->sum('fuel_gas'),2)}}</td>
        <td>{{round($data['Cepu']->sum('flare'),2)}}</td>
        <td>{{round($data['Cepu']->sum('injeksi_gas'),2)}}</td>
        <td>{{round($data['Cepu']->sum('injeksi_air'),2)}}</td>
    </tr>
    <tr>
        @php
            $totMinyakMadura  = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 2)
                                            ->sum('productions.produksi_minyak');
            $totGasMadura = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 2)
                                            ->sum('productions.produksi_gas');
            $totAirMadura = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 2)
                                            ->sum('productions.produksi_air');
            $totFuelGasMadura = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 2)
                                            ->sum('productions.fuel_gas');
            $totFlareMadura = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 2)
                                            ->sum('productions.flare');
            $totInjeksiGasMadura = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 2)
                                            ->sum('productions.injeksi_gas');
            $totInjeksiAirMadura = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 2)
                                            ->sum('productions.injeksi_air');
        @endphp
        <td><a href="{{route('production.show',2)}}">Madura Offshore <i class="fas fa-chart-line"></i>
                <a href="{{route('home.show',2)}}"><i class="far fa-eye"></i></a></a></td>
        <td>{{round($totMinyakMadura,2)}}</td>
        <td>{{round($totGasMadura,2)}}</td>
        <td>{{round($totAirMadura,2)}}</td>
        <td>{{round($totFuelGasMadura,2)}}</td>
        <td>{{round($totFlareMadura,2)}}</td>
        <td>{{round($totInjeksiGasMadura,2)}}</td>
        <td>{{round($totInjeksiAirMadura,2)}}</td>
    </tr>
    <tr>
        @php
            $totMinyakKangean = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 3)
                                            ->sum('productions.produksi_minyak');
            $totGasKangean = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 3)
                                            ->sum('productions.produksi_gas');
            $totAirKangean = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 3)
                                            ->sum('productions.produksi_air');
            $totFuelGasKangean = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 3)
                                            ->sum('productions.fuel_gas');
            $totFlareKangean = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 3)
                                            ->sum('productions.flare');
            $totInjeksiGasKangean = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 3)
                                            ->sum('productions.injeksi_gas');
            $totInjeksiAirKangean = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 3)
                                            ->sum('productions.injeksi_air');
        @endphp
        <td><a href="{{route('production.show',3)}}">Kangean <i class="fas fa-chart-line"></i></a>
            <a href="{{route('home.show',3)}}"><i class="far fa-eye"></i></a></td>
        <td>{{round($totMinyakKangean,2)}}</td>
        <td>{{round($totGasKangean,2)}}</td>
        <td>{{round($totAirKangean,2)}}</td>
        <td>{{round($totFuelGasKangean,2)}}</td>
        <td>{{round($totFlareKangean,2)}}</td>
        <td>{{round($totInjeksiGasKangean,2)}}</td>
        <td>{{round($totInjeksiAirKangean,2)}}</td>
    </tr>
    <tr>
        @php
            $totMinyakKetapang = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 4)
                                            ->sum('productions.produksi_minyak');
            $totGasKetapang = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 4)
                                            ->sum('productions.produksi_gas');
            $totAirKetapang = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 4)
                                            ->sum('productions.produksi_air');
            $totFuelGasKetapang = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 4)
                                            ->sum('productions.fuel_gas');
            $totFlareKetapang = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 4)
                                            ->sum('productions.flare');
            $totInjeksiGasKetapang = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 4)
                                            ->sum('productions.injeksi_gas');
            $totInjeksiAirKetapang = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 4)
                                            ->sum('productions.injeksi_air');
        @endphp
        <td><a href="{{route('production.show',4)}}">Ketapang <i class="fas fa-chart-line"></i></a>
            <a href="{{route('home.show',4)}}"><i class="far fa-eye"></i></a></td>
        <td>{{round($totMinyakKetapang,2)}}</td>
        <td>{{round($totGasKetapang,2)}}</td>
        <td>{{round($totAirKetapang,2)}}</td>
        <td>{{round($totFuelGasKetapang,2)}}</td>
        <td>{{round($totFlareKetapang,2)}}</td>
        <td>{{round($totInjeksiGasKetapang,2)}}</td>
        <td>{{round($totInjeksiAirKetapang,2)}}</td>
    </tr>
    <tr>
        @php
            $totMinyakWMO = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 5)
                                            ->sum('productions.produksi_minyak');
            $totGasWMO = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 5)
                                            ->sum('productions.produksi_gas');
            $totAirWMO = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 5)
                                            ->sum('productions.produksi_air');
            $totFuelGasWMO = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 5)
                                            ->sum('productions.fuel_gas');
            $totFlareWMO = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 5)
                                            ->sum('productions.flare');
            $totInjeksiGasWMO = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 5)
                                            ->sum('productions.injeksi_gas');
            $totInjeksiAirWMO = DB::table('productions')
                                            ->join('wilayah_kerjas', 'productions.wilayah_kerja_id', '=', 'wilayah_kerjas.id')
                                            ->where('productions.wilayah_kerja_id', '=', 5)
                                            ->sum('productions.injeksi_air');
        @endphp
        <td><a href="{{route('production.show',5)}}">WMO <i class="fas fa-chart-line"></i></a>
            <a href="{{route('home.show',5)}}"><i class="far fa-eye"></i></a></td>
        <td>{{round($totMinyakWMO,2)}}</td>
        <td>{{round($totGasWMO,2)}}</td>
        <td>{{round($totAirWMO,2)}}</td>
        <td>{{round($totFuelGasWMO,2)}}</td>
        <td>{{round($totFlareWMO,2)}}</td>
        <td>{{round($totInjeksiGasWMO,2)}}</td>
        <td>{{round($totInjeksiAirWMO,2)}}</td>
    </tr> --}}

    <tr class="font-weight-bold">
        @php
            $totMinyak = DB::table('productions')
                                ->sum('productions.produksi_minyak');
            $totGas = DB::table('productions')
                                    ->sum('productions.produksi_gas');
            $totAir = DB::table('productions')
                                    ->sum('productions.produksi_air');
            $totFuelGas = DB::table('productions')
                                    ->sum('productions.fuel_gas');
            $totFlare = DB::table('productions')
                                    ->sum('productions.flare');
            $totInjeksiGas = DB::table('productions')
                                    ->sum('productions.injeksi_gas');
            $totInjeksiAir = DB::table('productions')
                                    ->sum('productions.injeksi_air');
        @endphp
        <td>TOTAL</td>
        <td>{{round($total['produksi_minyak'],2)}}</td>
        <td>{{round($total['produksi_gas'],2)}}</td>
        <td>{{round($total['produksi_air'],2)}}</td>
        <td>{{round($total['fuel_gas'],2)}}</td>
        <td>{{round($total['flare'],2)}}</td>
        <td>{{round($total['injeksi_gas'],2)}}</td>
        <td>{{round($total['injeksi_air'],2)}}</td>
    </tr>
    {{-- <tr class="font-weight-bold">
        @php
            $totMinyak = DB::table('productions')
                               ->sum('productions.produksi_minyak');
            $totGas = DB::table('productions')
                                   ->sum('productions.produksi_gas');
            $totAir = DB::table('productions')
                                   ->sum('productions.produksi_air');
            $totFuelGas = DB::table('productions')
                                   ->sum('productions.fuel_gas');
            $totFlare = DB::table('productions')
                                   ->sum('productions.flare');
            $totInjeksiGas = DB::table('productions')
                                   ->sum('productions.injeksi_gas');
            $totInjeksiAir = DB::table('productions')
                                   ->sum('productions.injeksi_air');
        @endphp
        <td>TOTAL</td>
        <td>{{round($totMinyak,2)}}</td>
        <td>{{round($totGas,2)}}</td>
        <td>{{round($totAir,2)}}</td>
        <td>{{round($totFuelGas,2)}}</td>
        <td>{{round($totFlare,2)}}</td>
        <td>{{round($totInjeksiGas,2)}}</td>
        <td>{{round($totInjeksiAir,2)}}</td>
    </tr> --}}
    

    </tbody>
</table>
