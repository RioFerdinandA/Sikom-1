@extends('template_back.layout')

@section('content')
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);">Data Buku</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Form Data Buku</li>
            </ol>
        </nav>
    </div>
</div>
<div class="col-xl-12">
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <a href="{{ route ('buku.create')}}" class="btn btn-warning" <i class="fe fe-file-plus"></i> Tambah </a>
            </div>
            @include('componen.pesan')
        </div>
        <div class="card-body mt-3">
            <div class="table-responsive">
                <table class="table table-striped mg-b-1 text-md-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun terbit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dtBuku as $dt)
                            
                        
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $dt->judul}}</td>
                            <td>{{ $dt->penulis}}</td>
                            <td>{{ $dt->penerbit}}</td>
                            <td>{{ $dt->tahun_terbit}}</td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('buku.destroy', $dt->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('buku.edit', $dt->id) }}" title="Edit" class="btn btn-success btn-sm"><i  class="fa fa-edit"></i></a>
                                    <button type="submit" title="Hapus" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- bd -->
        </div><!-- bd -->
    </div><!-- bd -->
</div>
@endsection

