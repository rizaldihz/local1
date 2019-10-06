 <table id="tabReport" class="table table-striped table-responsive-stack w-auto">
    <thead>
    <tr>
        <th>Tanggal</th>
        <th>Produksi<div class="d-none d-md-inline"></div> <span class="badge bg-green">Oil</span></th>
        <th>Produksi<div class="d-none d-md-inline"></div> <span class="badge bg-red">Gas</span></th>
        <th>Produksi<div class="d-none d-md-inline"></div> <span class="badge bg-blue">Water</span></th>
        <th>Fuel Gas</th>
        <th>Flare</th>
        <th>Injeksi <span class="badge bg-red">Gas</span></th>
        <th>Injeksi <span class="badge bg-blue">Water</span></th>
    </tr>
    </thead>
    <tbody>
    @foreach($production as $product)
        <tr>
            <td>{{$product->tanggal}}</td>
            <td>{{round($product->produksi_minyak,2)}}</td>
            <td>{{round($product->produksi_gas,2)}}</td>
            <td>{{round($product->produksi_air,2)}}</td>
            <td>{{round($product->fuel_gas,2)}}</td>
            <td>{{round($product->flare,2)}}</td>
            <td>{{round($product->injeksi_gas,2)}}</td>
            <td>{{round($product->injeksi_air,2)}}</td>
        </tr>
    @endforeach

    </tbody>
</table>

