@extends('admin.master')
@section('content')
<!-- <h5 class="card-title mt-4 mb-4">Selamat Datang di Aplikasi Pengumpulan Data</h5> -->
<div class="row mt-4">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                            Total Upload</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 total-upload">{{ \App\Models\OpdFile::where('status_file', 'publikasi')->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-upload fa-2x text-primary" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                            Sinkronisasi Terakhir</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 total-file">{{ \Carbon\Carbon::now()->setTimeZone('7') }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-file fa-2x text-success" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a class="btn btn-primary" href="{{ url('/admin/api/sinkronisasi') }}">Sinkronisasi Data</a>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-download fa-2x text-danger" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
<div class="container-fluid">
<div class="row mt-4 border-bottom mb-4">
    <div class="col-md-6">
        <h5>Manajemen API CKAN</h5>
    </div>
    <div class="col-md-6 mb-4 d-flex justify-content-end">
        @if(Auth::user()->role == 'super admin')
            <a href="{{ url('/admin/api/sinkronisasi') }}">
                <button class="btn btn-sm btn-primary"><i class="fa fa-refresh"></i> Sinkronisasi Data</button>
            </a>
        @endif
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jumlah Data</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
    </div>
@endsection 
@push('scripts')
<script>
    $(document).ready(function(){
        var url = '{{ route("api.data") }}';
        var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: url,
            columns: [
                { data: "id"},
                { data: "created_at"},
                { data: "jumlah_data"},
                { data: "status"},
                { data: "keterangan" },
            ],
            "order": [[0, 'desc']],
             createdRow: function (row, data, index) {
                var td = $(row).find("td:first");
                if(data.total_parent == 0){
                    td.removeClass('details-control');
                }
             }
        });
        console.log(table);
    })
</script>
@endpush