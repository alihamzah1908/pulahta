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
    <div class="row mt-4 border-bottom mb-4">
        <div class="col-md-6">
            <h5>Data Perangkat Daerah</h3>
        </div>
        <div class="col-md-6 mb-4 d-flex justify-content-end">
            @if(Auth::user()->role == 'super admin')
                <a href="{{ route('opd.form') }}">
                    <button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</button>
                </a>
            @endif
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th></th>
                    <th>Nama Perangkat Daerah</th>
                    <th>Nama Alias Perangkat Daerah</th>
                    <th>Status File</th>
                    <th>Dibuat Pada</th>
                    <th class="d-flex justify-content-end">Aksi</th>
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
                { data: "dibuat_pada"},
                { data: "aksi" },
            ],
            "order": [[3, 'desc']],
            "pageLength": 25,
             createdRow: function (row, data, index) {
                var td = $(row).find("td:first");
                if(data.total_parent == 0){
                    td.removeClass('details-control');
                }
             }
        });
        console.log(table)
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