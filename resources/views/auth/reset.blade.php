@extends('layouts.app')

@section('content')
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 pt-3">
                    <div class="login-logo">
                        <a href="index.html"><b>GANTI PASSWORD</b></a>
                    </div>
                    <div class="card">
                    <form action="{{ url('resetPass') }}" method="POST">
                    @csrf
                        <div class="card-header">
                            <div class="input-group mb-3">
                                <label for="token" class="col-12 control-label">Jenis Password
                                </label>
                                <select class="form-control" name="token">
                                    <option value="" selected disabled hidden>Pilih jenis password</option>
                                    @foreach ($users as $user)
                                        <option value="{{\Crypt::encryptString($user->id)}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-body login-card-body">
                            {{-- @if($errors->any())
                                @foreach ($errors->all() as $error)
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $error }}</strong>
                                    </span>
                                @endforeach
                            @endif --}}
                            @error('password')
                                <span class="invalid-feedback" role="alert" style="display: block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-group mb-3">
                                <label for="old_password" class="col-12 control-label">Password Lama
                                </label>
                                <input type="password" class="form-control" name="old_password" placeholder="Password Lama">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label for="password" class="col-12 control-label">Password Baru
                                </label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label for="confirm" class="col-12 control-label">Masukkan ulang password
                                </label>
                                <input type="password" class="form-control" name="confirm" placeholder="Masukkan ulang Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ganti Password</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                    </form>
                    <!-- /.login-card-body -->
                    </div>
                    @if(session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            <strong>Sukses!</strong> {{ session()->get('message') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection