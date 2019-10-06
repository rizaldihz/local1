@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 pt-3">

                        <div class="form-group row">
                            <div class="col-5">
                                <div class="input-group">
                                    <div id="reportrange" class="btn btn-default float-right" >
                                        <i class="far fa-calendar-alt"></i>&nbsp;
                                        <span>Hari Ini</span> <i class="fa fa-caret-down"></i>
                                    </div>
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

                        <div class="alert alert-info alert-dismissible">
                            <span class="">Performa Admin: 80%</span>
                            <span class="bg-info disabled color-palette float-right"><span class="d-none d-md-inline">Jumlah hari entri data dalam 30 hari terakhir / 20 hari kerja</span></span>
                        </div>
                        <div class="row">

                            <div class="col-xl-4 col-lg-6 col-sm-12">

                                <!-- Horizontal Form -->
                                <div class="card card-default">
                                    <form method="post" action="{{route('production.store')}}" class="form-horizontal">
                                    <div class="card-header">
                                        <h3 class="card-title">Cepu</h3>
                                        <a class="float-right" href="#">Upload XLS</a>
                                        <div class="input-group">
                                            <label for="reportrange1"></label><input type="text" name="tanggal" value="" id="reportrange1" class="btn btn-default float-right" >
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->

                                        <input type="hidden" name="idwilayah" value=1>
                                        @csrf <!--{{ csrf_field() }}-->

                                        <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="varPMinyak[cepu]" class="col-sm-3 control-label">Produksi Oil
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="number" step="0.01" class="form-control" id="varPMinyak[cepu]" name="produksi_minyak" >
                                                            <div class="input-group-append"><span class="input-group-text">BOPD</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="varPGas[cepu]" class="col-sm-3 control-label">Produksi Gas
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="number" step="0.01" class="form-control" id="varPGas[cepu]" name="produksi_gas" >
                                                            <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="form-group row">
                                                <label for="varPAir[cepu]" class="col-sm-3 control-label">Produksi Water
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" class="form-control" id="varPAir[cepu]" name="produksi_air" >
                                                        <div class="input-group-append"><span class="input-group-text">BWPD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varFuelGas[cepu]" class="col-sm-3 control-label">Fuel Gas
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" class="form-control" id="varFuelGas[cepu]" name="fuel_gas" >
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varFlare[cepu]" class="col-sm-3 control-label">Flare
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" class="form-control" id="varFlare[cepu]" name="flare" >
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varIGas[cepu]" class="col-sm-3 control-label">Injeksi Gas
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" class="form-control" id="varIGas[cepu]" name="injeksi_gas">
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varIAir[cepu]" class="col-sm-3 control-label">Injeksi Water
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" class="form-control" id="varIAir[cepu]" name="injeksi_air" >
                                                        <div class="input-group-append"><span class="input-group-text">BWPD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        <!-- /.card-footer -->
                                    </form>
                                </div>
                                <!-- /.card -->


                            </div>
                            <div class="col-xl-4 col-lg-6 col-sm-12">

                                <!-- Horizontal Form -->
                                <div class="card card-default">
                                    <form method="post" action="{{route('production.store')}}" class="form-horizontal">
                                    <div class="card-header">
                                        <h3 class="card-title">Madura Offshore</h3>
                                        <a class="float-right" href="#">Upload XLS</a>
                                        <div class="input-group">
                                            <input type="text" name="tanggal" value="09-15-2019" id="reportrange2" class="btn btn-default float-right" >
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                        <input type="hidden" name="idwilayah" value=2>
                                    @csrf <!--{{ csrf_field() }}-->
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="varPMinyak[mo]" class="col-sm-3 control-label">Produksi Oil
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" class="form-control" id="varPMinyak[mo]" name="produksi_minyak">
                                                        <div class="input-group-append"><span class="input-group-text">BOPD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varPGas[mo]" class="col-sm-3 control-label">Produksi Gas
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="produksi_gas" class="form-control" id="varPGas[mo]">
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varPAir" class="col-sm-3 control-label">Produksi Water
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="produksi_air" class="form-control" id="varPAir" >
                                                        <div class="input-group-append"><span class="input-group-text">BWPD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varFuelGas" class="col-sm-3 control-label">Fuel Gas
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="fuel_gas" class="form-control" id="varFuelGas" >
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varFlare" class="col-sm-3 control-label">Flare
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" class="form-control" name="flare" id="varFlare">
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varIGas" class="col-sm-3 control-label">Injeksi Gas
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="injeksi_gas" class="form-control" id="varIGas" >
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varIAir" class="col-sm-3 control-label">Injeksi Water
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="injeksi_air" class="form-control" id="varIAir">
                                                        <div class="input-group-append"><span class="input-group-text">BWPD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        <!-- /.card-footer -->
                                    </form>
                                </div>
                                <!-- /.card -->

                            </div>
                            <div class="col-xl-4 col-lg-6 col-sm-12">

                                <!-- Horizontal Form -->
                                <div class="card card-default">
                                    <form method="post" action="{{route('production.store')}}" class="form-horizontal">
                                    <div class="card-header">
                                        <h3 class="card-title">Kangean</h3>
                                        <a class="float-right" href="#">Upload XLS</a>
                                        <div class="input-group">
                                            <input type="text" name="tanggal" value="09-15-2019" id="reportrange3" class="btn btn-default float-right" >
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->

                                        <input type="hidden" name="idwilayah" value=3>
                                    @csrf <!--{{ csrf_field() }}-->
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="varPMinyak" class="col-sm-3 control-label">Produksi Oil
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="produksi_minyak" class="form-control" id="varPMinyak">
                                                        <div class="input-group-append"><span class="input-group-text">BOPD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varPGas" class="col-sm-3 control-label">Produksi Gas
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="produksi_gas" class="form-control" id="varPGas">
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varPAir" class="col-sm-3 control-label">Produksi Water
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="produksi_air" class="form-control" id="varPAir" >
                                                        <div class="input-group-append"><span class="input-group-text">BWPD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varFuelGas" class="col-sm-3 control-label">Fuel Gas
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" class="form-control" id="varFuelGas" name="fuel_gas" >
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varFlare" class="col-sm-3 control-label">Flare
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="flare" class="form-control" id="varFlare" >
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varIGas" class="col-sm-3 control-label">Injeksi Gas
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="injeksi_gas" class="form-control" id="varIGas" >
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varIAir" class="col-sm-3 control-label">Injeksi Water
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" class="form-control" name="injeksi_air" id="varIAir" >
                                                        <div class="input-group-append"><span class="input-group-text">BWPD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        <!-- /.card-footer -->
                                    </form>
                                </div>
                                <!-- /.card -->

                            </div>
                            <div class="col-xl-4 col-lg-6 col-sm-12">

                                <!-- Horizontal Form -->
                                <div class="card card-default">
                                    <form method="post" action="{{route('production.store')}}" class="form-horizontal">
                                    <div class="card-header">
                                        <h3 class="card-title">Ketapang</h3>
                                        <a class="float-right" href="#">Upload XLS</a>
                                        <div class="input-group">
                                            <input type="text" name="tanggal" value="09-15-2019" id="reportrange4" class="btn btn-default float-right" >
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->

                                        <input type="hidden" name="idwilayah" value=4>
                                    @csrf <!--{{ csrf_field() }}-->
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="varPMinyak" class="col-sm-3 control-label">Produksi Oil
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="produksi_minyak" class="form-control" id="varPMinyak" >
                                                        <div class="input-group-append"><span class="input-group-text">BOPD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varPGas" class="col-sm-3 control-label">Produksi Gas
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" class="form-control" name="produksi_gas" id="varPGas" >
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varPAir" class="col-sm-3 control-label">Produksi Water
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="produksi_air" class="form-control" id="varPAir" >
                                                        <div class="input-group-append"><span class="input-group-text">BWPD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varFuelGas" class="col-sm-3 control-label">Fuel Gas
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="fuel_gas" class="form-control" id="varFuelGas" >
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varFlare" class="col-sm-3 control-label">Flare
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="flare" class="form-control" id="varFlare" >
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varIGas" class="col-sm-3 control-label">Injeksi Gas
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="injeksi_gas" class="form-control" id="varIGas">
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varIAir" class="col-sm-3 control-label">Injeksi Water
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="injeksi_air" class="form-control" id="varIAir" >
                                                        <div class="input-group-append"><span class="input-group-text">BWPD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        <!-- /.card-footer -->
                                    </form>
                                </div>
                                <!-- /.card -->

                            </div>
                            <div class="col-xl-4 col-lg-6 col-sm-12">

                                <!-- Horizontal Form -->
                                <div class="card card-default">
                                    <form method="post" action="{{route('production.store')}}" class="form-horizontal">
                                    <div class="card-header">
                                        <h3 class="card-title">WMO</h3>
                                        <a class="float-right" href="#">Upload XLS</a>
                                        <div class="input-group">
                                            <input type="text" name="tanggal" value="09-15-2019" id="reportrange5" class="btn btn-default float-right" >
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->

                                        <input type="hidden" name="idwilayah" value=5>
                                    @csrf <!--{{ csrf_field() }}-->
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="varPMinyak" class="col-sm-3 control-label">Produksi Oil
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step='0.01' class="form-control" name="produksi_minyak" id="varPMinyak">
                                                        <div class="input-group-append"><span class="input-group-text">BOPD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varPGas" class="col-sm-3 control-label">Produksi Gas
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="produksi_gas" class="form-control" id="varPGas" >
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varPAir" class="col-sm-3 control-label">Produksi Water
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" class="form-control" name="produksi_air" id="varPAir" >
                                                        <div class="input-group-append"><span class="input-group-text">BWPD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varFuelGas" class="col-sm-3 control-label">Fuel Gas
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="fuel_gas" class="form-control" id="varFuelGas">
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varFlare" class="col-sm-3 control-label">Flare
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="flare" class="form-control" id="varFlare">
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varIGas" class="col-sm-3 control-label">Injeksi Gas
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="injeksi_gas" class="form-control" id="varIGas">
                                                        <div class="input-group-append"><span class="input-group-text">MMSCFD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="varIAir" class="col-sm-3 control-label">Injeksi Water
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="injeksi_air" class="form-control" id="varIAir" >
                                                        <div class="input-group-append"><span class="input-group-text">BWPD</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        <!-- /.card-footer -->
                                    </form>
                                </div>
                                <!-- /.card -->

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
@endsection
