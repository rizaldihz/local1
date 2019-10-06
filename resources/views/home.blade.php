@extends('layouts.app')

@php
    /** @var \App\Production $productions */
    //echo $productions;
    use Illuminate\Support\Facades\DB;
@endphp

@section('content')


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 pt-3">

                        <div class="form-group row">
                            <div class="col-5">
                                <div class="input-group">
                                    <div id="reportrangehome" class="btn btn-default float-right" >
                                        <i class="far fa-calendar-alt"></i>&nbsp;
                                        @if(!isset($start))
                                        <span>Total</span>
                                        @else
                                        <span>{{\Carbon\Carbon::parse($start)->format('d M Y')}} - {{\Carbon\Carbon::parse($end)->format('d M Y')}}</span>
                                        @endif
                                        <i class="fa fa-caret-down"></i>
                                    </div>
                                    &nbsp;
                                    <a href="{{url('/')}}">
                                        <div id="refresh" class="btn btn-warning float-right" >
                                            {{-- <i class="fa fa-refresh"></i>&nbsp; --}}
                                            <span>Refresh</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-7">
                                <select class="form-control" id="selWilayahKerja">
                                    <option selected>Semua Wilayah Kerja</option>
                                    <option>Cepu</option>
                                    <option>Madura Offshore</option>
                                    <option>Kangean</option>
                                    <option>Ketapang</option>
                                    <option>WMO</option>
                                </select>
                            </div>
                        </div>



                        <div class="card mt-3">
                            <div class="card-body table-responsive p-0">
                                <div class="row pl-2 pt-2 pr-2">
                                    <div class="col-12">
                                        <a href="{{route('production.export',$productions[0]->id)}}" type="button" id="expXLS" class="btn btn-default btn-sm float-right ml-2"><i class="fa fa-download"></i> XLS</a>
                                        <div class="btn-group float-right">
                                            <button type="button" id="colAll" class="btn btn-default btn-sm">+</button>
                                            <button type="button" id="colProd" class="btn btn-default btn-sm">Produksi</button>
                                            <button type="button" id="colF" class="btn btn-default btn-sm">FG+F</button>
                                            <button type="button" id="colInject" class="btn btn-default btn-sm">Injeksi</button>
                                        </div>
                                    </div>
                                </div>
                                @include('tablehome',['productions'=>$productions,'data'=>$data])
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.redirect@1.1.4/jquery.redirect.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        //Date range as a button home
    $('#reportrangehome').daterangepicker({
        ranges   : {
        '7 hari terakhir' : [moment().subtract(6, 'days'), moment()],
        'Hari ini'        : [moment(), moment()],
        'Kemarin'         : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Bulan ini'       : [moment().startOf('month'), moment().endOf('month')],
        'Bulan lalu'      : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
        'Tahun ini'       : [moment().startOf('year'), moment().endOf('year')],
        'Tahun lalu'      : [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
        },
        startDate: moment().subtract(6, 'days'),
        endDate  : moment()
        },
        function (start, end) {
            $('#reportrangehome span').html(start.format('D MMM YYYY') + ' - ' + end.format('D MMM YYYY'))
        },
        $('#reportrangehome').on('apply.daterangepicker', function(ev, picker) {
            $.redirect('{{url('/')}}',
                        {'startDate':picker.startDate.format('YYYY-MM-DD'), 'endDate':picker.endDate.format('YYYY-MM-DD'), "_token": "{{ csrf_token() }}"}
            );
            {{-- // $.ajax({
            //     type:'POST',
            //     url:'{{url('/index')}}',
            //     data:{startDate:picker.startDate.format('YYYY-MM-DD'), endDate:picker.endDate.format('YYYY-MM-DD')},
            //     datatype:"json",
            //     success:function(data){
            //         alert(data.success);
            //     }
            // });
            // console.log(picker.startDate.format('YYYY-MM-DD'));
            // console.log(picker.endDate.format('YYYY-MM-DD')); --}}
        })
    );
</script>
@endsection
