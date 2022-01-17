@extends('admin.master')
@section('content')
<style>
    td.details-control {
        background: url("{{ asset('img/details_open.png')}}") no-repeat center center;
        cursor: pointer;
    }
    tr.shown td.details-control {
        background: url("{{ asset('img/details_close.png')}}") no-repeat center center;
    }
</style>
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h5>DATA SEKTORAL</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table dt-responsive nowrap" id="dataTable">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nama perangkat daerah</th>
                        <th>Nama alias perangkat daerah</th>
                        <th>Status file Dikirim</th>
                        <th>Status file Diterima</th>
                        <!-- <th>Upload file terbaru</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
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
                    var token = $("meta[name='csrf-token']").attr("content");
                    console.log(token)
                    $.ajax({
                        dataType: 'json',
                        method: 'DELETE',
                        url: '{{ route("opd.delete") }}',
                        data: {
                            "id": id,
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
        var url = '{{ route("sektoral.data") }}';
        var table = $('#dataTable').DataTable({
            language: {
                paginate: {
                    previous: "<i class='uil uil-angle-left'>",
                    next: "<i class='uil uil-angle-right'>"
                    }
            },
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            },
            processing: true,
            serverSide: true,
            ajax: url,
            columns: [
                {
                    "orderable":  false,
                    "data": null,
                    "defaultContent": ''
                },
                { data: "nama_opd"},
                { data: "alias_opd"},
                { data: "status_file_dikirim"},
                { data: "status_file_diterima"},
                // { data: "last_upload"},
                { data: "aksi" },
            ],
            "order": [[3, 'desc']],
            "pageLength": 25,
        });
    })
</script>
@endpush