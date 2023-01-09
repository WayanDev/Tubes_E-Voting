@extends('layout.admin')

@section('title')
Detail Paslon
@endsection

@section('css')
<link rel="stylesheet" href="/css/detail.css">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Paslon No {{ $data->no_urut_paslon }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">detail</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row d-flex justify-content-between mx-auto">
        @include('sweetalert::alert')
            <div class="col-md-6">
                <div class="card mx-auto">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <img src="/img_ketua/{{ $data->img_ketua }}" width="180" height="180" class="mx-auto mt-n1 rounded-circle">
                        <div class="nama mt-4">
                            <h3 class="text-center">{{ $data->ketua_paslon }}</h3>
                            <p class="text-center mt-n1">Ketua</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mx-auto">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <img src="/img_wakil/{{ $data->img_wakil }}" width="180" height="180" class="mx-auto mt-n1 rounded-circle">
                        <div class="nama mt-4">
                            <h3 class="text-center">{{ $data->wakil_paslon }}</h3>
                            <p class="text-center mt-n1">Wakil</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-auto rowVisi">
            <div class="col-md-10">
                <div class="judul visi">
                    <h1>Visi</h1>
                </div>
                <div class="isiVisi ml-4">
                    <p>{{ $data->visi_paslon }}</p>
                </div>
            </div>
        </div>
        <div class="row mx-auto rowMisi">
            <div class="col-md-10">
                <div class="judul misi">
                    <h1>Misi</h1>
                </div>
                <div class="isiMisi ml-4">
                    @php
                    $misi = explode("\r\n", $data->misi_paslon);
                    @endphp
                    @foreach ($misi as $m)

                    <p>{{ $m }}</p>

                    @endforeach

                </div>
            </div>
        </div>
        <div class="row mx-auto mt-5">
            <div class="col-md-6">
                <a href="/tabelPaslon" class="btn btn-danger btnKembali mb-5">Kembali</a>
            </div>
        </div>
    </div>
</section>

@endsection