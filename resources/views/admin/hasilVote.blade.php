@extends('layout.admin')
@section('title')
Hasil Vote
@endsection
@section('css')
<link rel="stylesheet" href="/css/hasilVote.css">
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Hasil Vote</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">HasilVote</li>
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
            @foreach( $data as $d )
            <div class="col-lg-6">
                <div class="card">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Paslon No {{ $d->no_urut_paslon }}</h3>
                    </div>
                    <div class="d-flex justify-content-center">
                        <h1 class="hasil">{{ $d->jumlah_vote }}</h1>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
