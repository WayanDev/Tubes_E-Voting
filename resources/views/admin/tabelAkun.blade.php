@extends('layout.admin')

@section('title')
Tabel Akun
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Data Akun</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">tabelAkun</li>
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
                <h3 class="card-title">Berikut adalah daftar data Akun</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Username</th>
                      <th class="text-center">Role</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Status</th>
                   </tr>
                  </thead>
                  @if( count($data) == 0)
                  <tbody>
                        <tr>
                            <td colspan="6" align="center">Tidak Ada Akun</td>
                        </tr>
                  </tbody>
                    @else
                    <tbody>
                        <?php $i =0;?>
                        @foreach ($data as $d)
                        <tr>
                            <td class="text-center">{{ ++$i }}</td>
                            <td class="text-center">{{ $d->username }}</td>
                            <td class="text-center">{{ $d->role }}</td>
                            <td class="text-center">{{ $d->email }}</td>
                            <td class="text-center">{{ $d->nama }}</td>
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