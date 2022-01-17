@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h5>Data Perangkat Daerah</h3>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    @if(Auth::user()->role == 'super admin')
                        <a href="{{ route('opd.form') }}">
                            <button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</button>
                        </a>
                    @endif
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
                        <th>Status file</th>
                        <!-- <th>Status file (yang diterima)</th> -->
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
        function format ( d ) {
        var url = '{{ route("opd_parent.data") }}';
        var id = d.data().id;
        var table = $('<table class="display" width="100%"/>');
            // Display it the child row
            d.child(table).show();

            // Initialise as a DataTable
            var usersTable = table.DataTable({
                dom: 'Bfrtip',
                pageLength: 5,
                ajax: {
                    url: url + '?id=' + id,
                    type: 'get',
                    data: function ( d ) {
                        // d.site = rowData.id;
                    }
                },
                columns: [
                    { title: 'Nama User OPD', data: 'nama_uptd' },
                    { title: 'Aksi', data: 'aksi' },
                ],
                select: false,
                searching: false,
                paging: false,
                buttons: []
            });
        }
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
        $('body').on('click', '.delete-parent', function(){
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
                    $.ajax({
                        dataType: 'json',
                        method: 'DELETE',
                        url: '{{ route("uptd.delete_data") }}',
                        data: {
                            "id": id,
                            "_token" : token,
                        }
                    }).done(function(response){
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
        var url = '{{ route("opd.data") }}';
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
                    "className": 'details-control',
                    "orderable":  false,
                    "data": null,
                    "defaultContent": ''
                },
                { data: "nama_opd"},
                { data: "alias_opd"},
                { data: "status_file"},
                // { data: "last_upload"},
                { data: "aksi" },
            ],
            "order": [[3, 'desc']],
            "pageLength": 25,
             createdRow: function (row, data, index) {
                var td = $(row).find("td:first");
                if(data.total_parent == 0){
                    td.removeClass('details-control');
                }
             },
        });
        $('#dataTable tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                format(row, 'child-table');
                tr.addClass('shown');
            }
        });
    })
</script>
@endpush