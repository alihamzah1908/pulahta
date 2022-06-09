@extends('admin.master')
@section('content')
<div class="container-fluid">
    @php 
    $opd = \App\Models\Opd::where('id', request()->id)->first();
    @endphp
    <div class="row mt-3">
        <div class="col-md-12">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('lkpj') }}">Lkpj</a></li>
                <li class="breadcrumb-item active">Dataset {{ $opd->nama_opd }}</li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                        <h5>Dataset LKPJ {{ $opd->nama_opd }}</h5>
                    </div>
                <div class="col-md-6 mt-2 d-flex justify-content-end">
                    <a href="{{ route('lkpj.form') }}?id={{ request()->id }}">
                        <button class="btn btn-sm btn-primary"><i class="fa fa-upload" aria-hidden="true"></i> Upload File</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
        <table class="table dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>Nama dataset</th>
                    <th>Nama Perangkat Daerah</th>
                    <th>File</th>
                    <th>Diupload oleh</th>
                    <th>Jenis file</th>
                    <th>Status file</th>
                    <th>Dibuat pada</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php 
                $opd = \App\Models\OpdFile::whereNull('deleted_at')->where('opd_id', request()->id)
                        ->where('jenis_file','lkpj')
                        ->orderBy('id','desc')
                        ->get();
                @endphp
                @foreach($opd as $val)
                    <tr>
                        <td>{{ $val->judul }}</td>
                        <td>{{ $val->get_opd->nama_opd }}</td>
                        <td>
                            <a href="{{ route('opdfile.download') }}?id={{$val->id}}&file={{ $val->file }}">
                                <div class="icon-item">
                                    <i data-feather="file"></i>
                                </div>
                            </a>
                        </td>
                        <!-- <td> $val->upload_by_uptd ? $val->upload_by_uptd->nama_uptd : $val->get_opd->nama_opd </td> -->
                        <td>{{ $val->get_user ? $val->get_user->name : '' }}</td>
                        <!-- <td>$val->uptd_id || $val->get_uptd_list != '' ? $val->get_uptd_list->nama_uptd : $val->get_opd->nama_opd </td> -->
                        <td>{{ strtoupper($val->jenis_file) }}</td>
                        <td>
                            @if($val->status_file == 'asli')
                                <span class="badge badge-primary">{{ $val->status_file }}</span>
                            @elseif($val->status_file == 'verifikasi')
                                <span class="badge badge-warning">{{ $val->status_file }}</span>
                            @else 
                                <span class="badge badge-success">{{ $val->status_file }}</span>
                            @endif
                        </td>
                        <td>{{ date('d M Y', strtotime($val->created_at)) }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Aksi 
                                    <i class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></i>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    @if(Auth::user()->username != 'datainformasi' && Auth::user()->username != 'bidang.ppm' && Auth::user()->username != 'bidang.psda' && Auth::user()->username != 'bidang.infrawil' && Auth::user()->username != 'bidang.litbang' && Auth::user()->role == 'super admin')
                                        @if($val->status_file == 'asli')
                                            <a class="dropdown-item ubah_status" role="presentation" href="javascript:void(0)" data-id="{{ $val->id }}" data-bind="verifikasi">Verifikasi File</a>
                                        @elseif($val->status_file == 'verifikasi')
                                            <a class="dropdown-item ubah_status" role="presentation" href="javascript:void(0)" data-id="{{ $val->id }}" data-bind="publikasi">Publikasi File</a>
                                        @endif
                                    @endif
                                    <a class="dropdown-item" role="presentation" href="{{ route('lkpj.evidence') }}?id={{ $val->id }}">Evidence</a>
                                    <a class="dropdown-item" role="presentation" href="{{ route('opdfile.download') }}?id={{ $val->id}}&file={{ $val->file }}">Download</a>
                                    @if(Auth::user()->username != 'datainformasi' && Auth::user()->username != 'bidang.ppm' && Auth::user()->username != 'bidang.psda' && Auth::user()->username != 'bidang.infrawil' && Auth::user()->username != 'bidang.litbang' && Auth::user()->role == 'super admin')
                                    <a class="dropdown-item delete" role="presentation" href="javascript:void(0)" data-bind="{{ $val->id }}" data-file="{{ $val->file }}">Delete</a>
                                    @endif
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
            language: {
                paginate: {
                    previous: "<i class='uil uil-angle-left'>",
                    next: "<i class='uil uil-angle-right'>"
                    }
            },
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            },
            "order": [[4, 'desc']],
            "pageLength": 25,
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