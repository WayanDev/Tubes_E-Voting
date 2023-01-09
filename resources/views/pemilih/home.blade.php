@php
use App\voting;
use App\HasilVoting;
@endphp

@extends('layout.admin')

@section('title')
Pemilihan
@endsection

@section('css')
<link rel="stylesheet" href="/css/homePemilih.css">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pilih Ketua Kesayanganmu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Voting</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
@include('sweetalert::alert')
<div class="content">
    <div class="container-fluid">
        <div class="row">
        @foreach( $data as $d )
          <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                        <h3 class="card-title">No Urut {{ $d->no_urut_paslon }}</h3>
                    </div>
                </div>
                <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                            </p>
                        </div>
                        <!-- /.d-flex -->

                        <div class="position-relative mb-4">
                            <div class="row mx-auto">
                                <div class="col-md-6 mt-4">
                                    <div class="card-body d-flex flex-column justify-content-center">
                                        <img src="/img_ketua/{{ $d->img_ketua }}" width="180" height="180"
                                            class="mx-auto mt-n4 rounded-circle">
                                        <div class="nama mt-4">
                                            <h5 class="text-center">{{ $d->ketua_paslon }}</h5>
                                            <p class="text-center mt-n1">Ketua</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="card-body d-flex flex-column justify-content-center">
                                        <img src="/img_wakil/{{ $d->img_wakil }}" width="180" height="180"
                                            class="mx-auto mt-n4 rounded-circle">
                                        <div class="nama mt-4">
                                            <h5 class="text-center">{{ $d->wakil_paslon }}</h5>
                                            <p class="text-center mt-n1">Wakil</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto rowOpsi">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <div class="opsi">
                                        <a href="/detail/{{ $d->id }}" class="btn btn-outline-success mr-1">Detail Paslon</a>
                                        @php
                                        $id_user = Auth::user()->id;
                                        @endphp
                                        @if( voting::where('id_user', $id_user)->first() )

                                        <a href="/pilihPaslon/{{ $d->id }}" class="btn btn-success ml-1 shadow disabled">Pilih
                                            Paslon</a>

                                        @else

                                        <a href="/pilihPaslon/{{ $d->id }}"
                                            class="btn btn-success ml-1 shadow {{ ( count(HasilVoting::all()) >= 1 ) ? 'disabled' : '' }}">Pilih
                                            Paslon</a>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                        </div>
                </div>
                </div>
            </div> 
            @endforeach
        </div>        
    </div>
</div>
            <!-- /.card -->
@endsection