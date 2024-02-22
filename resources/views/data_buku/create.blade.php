@extends('template_back.layout')

@section('content')
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);">Data Buku</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form input Data Buku </li>
            </ol>
        </nav>
    </div>
   
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    Silahkan isi form di bawah ini dengan lengkap.
                </div>
                <p class="mg-b-20"></p>
                @include('componen.pesan')
                <div class="pd-30 pd-sm-40 bg-gray-100">
                    <form action="{{ route ('buku.store')}}" method="post">
                        @csrf
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-4">
                            <label class="form-label mg-b-0">Judul Buku</label>
                        </div>
                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" placeholder="Masukan nama Judul Buku" name='judul' value="{{ old('judul') }}"  type="text">
                        </div>
                    </div>
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-4">
                            <label class="form-label mg-b-0">Penulis</label>
                        </div>
                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" placeholder="Masukan nama penulis" name='penulis' value="{{ old('penullis') }}"  type="text">
                        </div>
                    </div>
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-4">
                            <label class="form-label mg-b-0">Penerbit</label>
                        </div>
                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" placeholder="Masukan nama Penerbit" name='penerbit' value="{{ old('penerbit') }}"  type="text">
                        </div>
                    </div>
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-4">
                            <label class="form-label mg-b-0">Tahun terbit</label>
                        </div>
                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <input class="form-control" placeholder="Masukan Tahun terbit contoh 2020" name='tahun_terbit' value="{{ old('tahun_terbit') }}" type="number">
                        </div>
                    </div>
                    <button class="btn ripple btn-primary" type="submit"><i class='fa fa-save'></i> Save </button>
                    <a href="{{ route('buku.index') }}" class="btn ripple btn-danger"><i
                        class='fa fa-chevron-left'></i> Back <a/>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /row -->
@endsection

