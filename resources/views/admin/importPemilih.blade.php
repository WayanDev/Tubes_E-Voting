@extends('layout.admin')

@section('title')
Import Akun
@endsection

@section('css')
<link rel="stylesheet" href="/css/importPemilih.css">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Import Akun</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">importAkun</li>
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
                <div class="card mt-4 mb-5 mx-auto">
                    <div class="card-body">
                        <form action="/user/import_excel" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3 rowInput">
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fileExcel"
                                                aria-describedby="inputGroupFileAddon01" name="file_excel"
                                                value="{{ old('img_wakil') }}" onchange="previewFile()" required>
                                            <label class="custom-file-label" for="gambarWakil">
                                                <p id="filenameExcel">Choose file</p>
                                            </label>
                                        </div>
                                    </div>
                                    @if( $errors->has('file_excel') )
                                    <div class="text-danger mt-n2">
                                        {{ $errors->first('file_excel') }}
                                    </div>
                                    @endif
                                </div>

                            </div>
                            <div class="row mt-4 mb-3 rowInput">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary m-auto">Import</button>
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

@section('js')
    
    <script src="/js/preview.js"></script>

@endsection