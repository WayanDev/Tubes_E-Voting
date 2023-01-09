@extends('layout.admin')

@section('title')
Register Pemilih
@endsection

@section('css')
<link rel="stylesheet" href="/css/registerPemilih.css">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Akun</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">registerAkun</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
@include('sweetalert::alert')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card mt-4 mb-5">
                    <div class="card-body">
                        <form action="/prosesRegisterPemilih" method="POST">
                            @csrf
                            <div class="row mt-3 rowInput">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username"
                                            placeholder="Masukkan Username" name="username" value="{{ old('username') }}">

                                        @if( $errors->has('username') )
                                        <div class="text-danger">
                                            {{ $errors->first('username') }}
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Masukkan Email" name="email" value="{{ old('email') }}">

                                        @if( $errors->has('email') )
                                        <div class="text-danger">
                                            {{ $errors->first('email') }}
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Masukkan Password" name="password" value="{{ old('password') }}">

                                        @if( $errors->has('password') )
                                        <div class="text-danger">
                                            {{ $errors->first('password') }}
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 mb-3 rowInput">
                                <div class="col-md-12">
                                    
                                    <button type="submit" class="btn btn-primary m-auto">Daftar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
