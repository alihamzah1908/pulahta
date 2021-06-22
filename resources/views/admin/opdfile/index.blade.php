@extends('admin.master')
@section('content')
<div class="container-fluid">
    <h3 class="mt-4 mb-3">Data File Perangkat Daerah</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('opd.index') }}">Perangkat Daerah</a></li>
        <li class="breadcrumb-item active">Data File Perangkat Daerah</li>
    </ol>
    @php 
    $opd = \App\Models\Opd::where('id', request()->id)->first();
    @endphp
    <div class="row">
        <div class="col-md-12 mb-4">
            <a href="{{ route('opdfile.form') }}?id={{ request()->id }}">
                <button class="btn btn-sm btn-primary"><i class="fa fa-upload" aria-hidden="true"></i> Upload File</button>
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama Dataset</th>
                    <th>Nama Perangkat</th>
                    <th>File</th>
                    <th>Diupload Oleh</th>
                    <th>File Diupload Untuk</th>
                    <th>Status File</th>
                    <th>Dibuat Pada</th>
                    <th class="d-flex justify-content-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php 
                $opd = \App\Models\OpdFile::where('opd_id', request()->id)->get();
                @endphp
                @foreach($opd as $val)
                    <tr>
                        <td>{{ $val->judul }}</td>
                        <td>{{ $val->get_opd->nama_opd }}</td>
                        <td>
                            <a href="{{ route('opdfile.download') }}?id={{$val->id}}&file={{ $val->file }}">
                                <i class="fa fa-file" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>{{ $val->upload_by_uptd ? $val->upload_by_uptd->nama_uptd : $val->get_opd->nama_opd }}</td>
                        <td>{{ $val->get_uptd ? $val->get_uptd->nama_uptd : $val->get_opd->nama_opd}}</td>
                        <td>
                            @if($val->status_file == 'asli')
                                <span class="badge badge-primary">{{ $val->status_file }}</span>
                            @elseif($val->status_file == 'verifikasi')
                                <span class="badge badge-warning">{{ $val->status_file }}</span>
                            @else 
                                <span class="badge badge-success">{{ $val->status_file }}</span>
                            @endif
                        </td>
                        <td>{{ date('d M Y H:i', strtotime($val->created_at)) }}</td>
                        <td class="d-flex justify-content-end">
                            <div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Aksi</button>
                                <div class="dropdown-menu" role="menu">
                                    @if(Auth::user()->role == 'super admin')
                                    <a class="dropdown-item" role="presentation" href="{{ route('file.metadata') }}?id={{$val->id}}">Tambah Kamus Data</a>
                                        @if($val->status_file == 'asli')
                                            <a class="dropdown-item ubah_status" role="presentation" href="javascript:void(0)" data-id="{{ $val->id }}" data-bind="verifikasi">Ubah Status File</a>
                                        @elseif($val->status_file == 'verifikasi')
                                            <a class="dropdown-item ubah_status" role="presentation" href="javascript:void(0)" data-id="{{ $val->id }}" data-bind="publikasi">Ubah Status File</a>
                                        @endif
                                    @endif
                                    <a class="dropdown-item delete" role="presentation" href="javascript:void(0)" data-bind="{{ $val->id }}" data-file="{{ $val->file }}">Delete</a>
                                    <a class="dropdown-item" role="presentation" href="{{ route('opdfile.download') }}?id={{$val->id}}&file={{ $val->file }}">Download</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('#dataTable').dataTable({
            "order": [[4, 'desc']],
        });
        $('body').on('click', '.delete', function(){
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr('data-bind');
                    var file = $(this).attr('data-file');
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        dataType: 'json',
                        method: 'DELETE',
                        url: '{{ route("opd_file.delete") }}',
                        data: {
                            "id": id,
                            "file" : file,
                            "_token" : token,
                        }
                    }).done(function(){
                        Swal.fire(
                            'Terhapus!',
                            'Data sudah terhapus.',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.reload()
                            }
                        })
                    })
                }
            })
        })

        $('body').on('click', '.ubah_status', function(){
            var status = $(this).attr('data-bind');
            var id = $(this).attr('data-id');
            var token = $("meta[name='csrf-token']").attr("content");
            Swal.fire({
                title: 'Apakah anda yakin ?',
                text: "File status akan berubah menjadi "+ status +"!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, '+ status +' data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        dataType: 'json',
                        method: 'post',
                        url: '{{ route("file.update_status") }}',
                        data: {
                            "id": id,
                            "status" : status,
                            "_token" : token,
                        }
                    }).done(function(){
                        Swal.fire(
                            'Terubah!',
                            'File Status ' + status + '.',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.reload()
                            }
                        })
                    })
                }
            })
        })
    })
</script>
@endpush