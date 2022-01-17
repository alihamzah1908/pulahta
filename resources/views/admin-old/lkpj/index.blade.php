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
            <h5>LKPJ</h3>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th></th>
                    <th>Nama perangkat daerah</th>
                    <th>Nama alias perangkat daerah</th>
                    <th>Status file</th>
                    <!-- <th>Upload file terbaru</th> -->
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
        var url = '{{ route("lkpj.data") }}';
        var table = $('#dataTable').DataTable({
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
                { data: "status_file"},
                // { data: "last_upload"},
                { data: "aksi" },
            ],
            "order": [[3, 'desc']],
            "pageLength": 25,
        });
    })
</script>
@endpush