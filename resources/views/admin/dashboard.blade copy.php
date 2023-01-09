@extends('layout.admin')
@php
use App\HasilVoting;
@endphp
@section('title')
Dashboard
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
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
                <div class="col-md-12 mt-5">
                    <div class="card mt-3">
                                <table class="table table-bordered mx-auto mt-3 table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="9%">No Urut</th>
                                            <th class="text-center" width="23%">Nama Ketua</th>
                                            <th class="text-center" width="23%">Nama Wakil</th>
                                            <th class="text-center" width="25%">Aksi</th>
                                        </tr>
                                    </thead>
                                    @if( count($data) == 0 )
                                    <tbody>
                                        <tr>
                                            <td colspan="6" align="center">Tidak Ada Paslon</td>
                                        </tr>
                                    </tbody>
                                    @else
                                    <tbody>
                                        @foreach ($data as $d)
                                        <tr>
                                            <td class="text-center">{{ $d->no_urut_paslon }}</td>
                                            <td class="text-center">{{ $d->ketua_paslon }}</td>
                                            <td class="text-center">{{ $d->wakil_paslon }}</td>
                                            <td class="text-center">
                                                <a href="/edit/{{ $d->id }}" class="btn btn-primary btnaksi">Edit</a>
                                                <a href="/detailPaslon/{{ $d->id }}"
                                                    class="btn btn-success btnDetail btnaksi">Detail</a>
                                                <a href="/hapus/{{ $d->id }}" class="btn btn-danger btnaksi"
                                                    onclick="return confirm('Yakin Ingin Di Hapus?')">Hapus</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection