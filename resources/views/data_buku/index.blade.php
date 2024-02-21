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
            <div class="d-flex my-auto btn-list justify-content-end">
                <a href="{{ route('buku.create') }}" class="btn btn-sm btn-danger"><i
                    class="fa fa-plus"></i> Tambah</a></a>
            <!-- BUTTON MODAL IMPORT EXCEL -->
            <button onclick="formImport()" class="btn btn-sm btn-warning"><i
                    class="fa fa-upload me-2"></i> Import</button>
            <!-- BUTTON DROPDOWN -->
            <div class="dropdown">
                <!-- BUTTON UNTUK MELAKUKAN EXPORT PDF -->
                <button type="button" class="btn btn-sm btn-success dropdown-toggle"
                    data-bs-toggle="dropdown">
                    <i class="fa fa-download me-2"></i>Export
                </button>
                <!-- BUTTON UNTUK MELAKUKAN EXPORT EXCEL -->
                <div class="dropdown-menu">
                    <a class="dropdown-item" href={{ route('export_excel_buku') }} 
                        onclick="exportExcel()">Excel</a>
                    <a class="dropdown-item" href={{ route('export_pdf_buku') }} onclick="exportPdf()">PDF</a>
                </div>
            </div>
            </div>
            <hr>
            @include('componen.pesan')
        </div>
        <div class="card-body mt-3">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped mg-b-1 text-md-nowrap mb-3">
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
                {{ $dtBuku->links() }}
            </div><!-- bd -->
        </div><!-- bd -->
    </div><!-- bd -->
    @include('data_buku.import')
</div>

<script>
    (function() {
        // SCRIPT UNTUK MENGGUNAKAN SELECT 2
        $('.select2').select2({
            width: 'resolve'
        });

        // SCRIPT DATATABLE.
        $('#tbl_list').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

    });

    // SCRIPT IMPORT EXCEL
    function formImport() {
        $("#formImport")[0].reset();
        $("#mdl_formImport").modal('show');
    }
</script>
@endsection

