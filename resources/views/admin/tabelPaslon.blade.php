@extends('layout.admin')

@section('title')
Tabel Paslon
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Data Paslon</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">tabelPaslon</li>
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Berikut adalah daftar data Paslon</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th class="text-center">No Urut</th>
                      <th class="text-center">Foto Ketua</th>
                      <th class="text-center">Foto Wakil</th>
                      <th class="text-center">Nama Ketua</th>
                      <th class="text-center">Nama Wakil</th>
                      <th class="text-center">Aksi</th>
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
                            <td class="text-center">
                                @if(empty($d->img_ketua))
                                <img src="{{ asset('img_ketua/foto_peminjam_kosong.png') }}" alt="" style="width:50px;height:60px;">
                                @else
                                <img src="{{ asset('img_ketua/'.$d->img_ketua) }}" alt="" style="width:50px;height:60px;">
                                @endif
                            </td>
                            <td class="text-center">
                                @if(empty($d->img_wakil))
                                <img src="{{ asset('img_wakil/foto_peminjam_kosong.png') }}" alt="" style="width:50px;height:60px;">
                                @else
                                <img src="{{ asset('img_wakil/'.$d->img_wakil) }}" alt="" style="width:50px;height:60px;">
                                @endif
                            </td>
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
    </section>

@endsection