@php
use App\HasilVoting;
@endphp
@extends('layout.admin')

@section('title')
Dashboard
@endsection

@section('css')
<link rel="stylesheet" href="/css/dashboard.css">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        @include('sweetalert::alert')
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-friends"></i></span>

              <div class="info-box-content">
                <p>
                  <span class="number">
                    @foreach($jumlahkandidat as $jumlah)
                      {{ $jumlah->jumlah }}
                    @endforeach
                  </span>
                  <span class="info-box-text">Paslon</span>
                </p>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-volume-up"></i></span>

              <div class="info-box-content">
                <p>
                  <span class="number">
                    @foreach($jumlahhaksuara as $jumlah)
                      {{ $jumlah->jumlah }}
                    @endforeach
                  </span>
                  <span class="info-box-text">Hak Suara</span>
                </p>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-database"></i></span>

              <div class="info-box-content">
                <p>
                  <span class="number">
                    @foreach($suaramasuk as $jumlah)
                      {{ $jumlah->suaramasuk }}
                    @endforeach
                  </span>
                  <span class="info-box-text">Suara Masuk</span>
                </p>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <a class="info-box-icon bg-warning elevation-1" href="">
                <span ><i class='fas fa-sync' style='color:white;'></i></span>
              </a>
              <div class="info-box-content">
                <p>
                  <span class="number">Refresh</span>
                  <span class="info-box-text">Manual</span>
                </p>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <a href="/voteSelesai"
          class="btn btn-outline-secondary ml-1 mt-2 btnSelesai btnpaslon {{ ( count(HasilVoting::all()) >= 1 ) ? 'disabled' : '' }}">Vote Selesai</a>
        <!-- /.row -->
          @if( count(HasilVoting::all()) >= 1 )
            <a href="/hasilVote"
              class="btn btn-warning mr-1 float-right btnHasil mt-2 btnpaslon">Hasil Vote</a>
         @endif
        <!-- /.row -->
            <!-- /.card -->
        <!-- Main row -->
        
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection('content')
