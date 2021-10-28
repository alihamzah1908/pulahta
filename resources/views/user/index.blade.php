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
            <h5>Data users</h5>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            @if(Auth::user()->role == 'super admin')
            <button class="btn btn-primary btn-sm mb-4 ml-2 add">
                <i class="fa fa-plus"></i> Tambah User
            </button>
            @endif
        </div>
    </div>
    <div class="table-responsive table-striped">
        <table class="table" id="dataTable">
            <thead>
                <tr>
                    <th></th>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <!-- Demo content -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data" id="import_participan">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Tambah Data User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Nama User</label>
                                <input type="text" name="name" class="form-control" id="nama">
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Username </label>
                                <input type="text" name="username" class="form-control" id="username">
                            </div>
                        </div>
                    </div>
                    <div class="modal-body content_email">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                        </div>
                    </div>
                    <div class="modal-body content_password">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control password" id="password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label>User Sebagai</label>
                                <select name="role" class="form-control" id="user_sebagai">
                                    <option value="">Pilih</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label>OPD Parent</label>
                                @php
                                $opd = \App\Models\Opd::all();
                                @endphp
                                <select name="opd_parent" class="form-control" id="opd_parent" {{Auth::user()->role != 'super admin' ? ' disabled' : ''}} required>
                                    <option value="">Pilih</option>
                                    @foreach($opd as $val)
                                        <option value="{{ $val->id }}">{{ $val->nama_opd }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body" id="uptd_parent" style='display: none'>
                        <div class="row">
                            <div class="col-md-12">
                                <label>UPTD Parent Opd</label>
                                <select name="uptd_parent" class="form-control" id="uptd_parent_select" {{Auth::user()->role != 'super admin' ? ' disabled' : ''}}>
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <input type="hidden" name="id_child" id="id_child" value=""/>
                <input type="hidden" name="id" id="id" value=""/>
            </div>
        </form>
    </div>
    <div class="modal fade" id="modal-add-staff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data" id="import_participan">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Nama User</label>
                                <input type="text" name="name" class="form-control" id="nama">
                            </div>
                        </div>
                    </div>
                    <div class="modal-body content_email">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Username</label>
                                <input type="username" name="username" class="form-control" id="username">
                            </div>
                        </div>
                    </div>
                    <div class="modal-body content_email">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                        </div>
                    </div>
                    <div class="modal-body content_password">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label>User Sebagai</label>
                                <select name="role" class="form-control" id="user_sebagai">
                                    <option value="">Pilih</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label>OPD Parent</label>
                                @php
                                $opd = \App\Models\Opd::all();
                                @endphp
                                <select name="opd_parent" class="form-control" id="opd_parent" required>
                                    <option value="">Pilih</option>
                                    @foreach($opd as $val)
                                        <option value="{{ $val->id }}">{{ $val->nama_opd }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body" id="uptd_parent_staff" style='display: none'>
                        <div class="row">
                            <div class="col-md-12">
                                <label>UPTD Parent Opd</label>
                                <select name="uptd_parent" class="form-control" id="uptd_parent_select_staff">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <input type="hidden" name="id_child" id="id_child_staff" value=""/>
                <input type="hidden" name="id" id="id" value=""/>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    function format ( d ) {
        var url = '{{ route("user_parent.datatable") }}';
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
                    { title: 'Nama User', data: 'name' },
                    { title: 'Username', data: 'username' },
                    { title: 'User Sebagai', data: 'role' },
                    { title: 'Aksi', data: 'aksi' },
                ],
                select: false,
                searching: false,
                paging: false,
                buttons: []
            });
    }
    $(document).ready(function(){
        $(".desa_id").hide()
        // Sidebar toggle behavior
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar, #content').toggleClass('active');
        });

        $('body').on('click','.add', function(){
            $(".content_password").show()
            $(".password").prop('disabled', false)
            $(".content_email").show()
            $("#exampleModalLabel1").html('Tambah User')
            $('#exampleModal').modal('show')
        })

        $('body').on('click','.add-staff', function(){
            var id_user = $(this).attr("data-bind");
            $("#id_child_staff").val(id_user)
            $("#user_sebagai").val("Staff Opd")
            $('#modal-add-staff').modal('show')
        })

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
                        url: '{{ route("user.delete") }}',
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
            if(confirm('Apakah anda yakin menghapus data ini ?')){
                var id = $(this).attr('data-bind');
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    dataType: 'json',
                    method: 'DELETE',
                    url: '{{ route("user.delete_parent") }}',
                    data: {
                        "id": id,
                        "_token" : token,
                    }
                }).done(function(){
                    location.reload()
                })
            }
        })

        $('body').on('click','.close', function(){
            $("#id").val(' ')
            $("#nama").val(' ')
            $("#email").val(' ')
            $("#password").val(' ')
            $("#username").val(' ')
            $("#user_sebagai").val(' ')
            $("#password").prop('disabled', true)
            $("#kecamatan_id").val(' ')
            $("#id_child").val(' ')
            $("#exampleModalLabel1").html(' ')
            $('#exampleModal').modal('hide')
        })

        $('body').on('click','.close-modal', function(){
            $("#id").val(' ')
            $("#nama").val(' ')
            $("#email").val(' ')
            $("#password").val(' ')
            $("#username").val(' ')
            $("#user_sebagai").val(' ')
            $("#password").prop('disabled', true)
            $("#kecamatan_id").val(' ')
            $("#id_child").val(' ')
            $("#exampleModalLabel1").html(' ')
            $('#exampleModal').modal('hide')
        })

        $('body').on('click','.edit', function(){
            var data = JSON.parse($(this).attr("data-bind"));
            $("#id").val(data.id)
            $("#nama").val(data.name)
            $("#username").val(data.username)
            $("#email").val(data.email)
            $("#password").val(data.password)
            $("#user_sebagai").val(data.role)
            $("#password").prop('disabled', true)
            $("#kecamatan_id").val(data.kecamatan_id)
            $(".content_password").hide()
            $(".content_email").hide()
            $("#id_child").val(data.parent_admin)
            $("#opd_parent").val(data.opd_parent)
            $("#exampleModalLabel1").html('Edit User')
            $('#exampleModal').modal('show')
            $("#uptd_parent_select").html(' ')
            $.ajax({
                dataType: 'json',
                method: 'get',
                url : '{{ route("data.uptd") }}',
                data: {
                    "id" : data.opd_parent
                }
            }).done(function(response){
                if(response.length > 0 && data.role != 'Admin'){
                    $("#uptd_parent").show()
                    $.each(response, function(index, value){
                        console.log(value.id + ' ' + data.opd_parent)
                        var selected = value.id == data.uptd_parent ? ' selected' : ''
                        $("#uptd_parent_select").append('<option value=' + value.id + '' + selected + '>' + value.nama_uptd + '</option>');
                    })
                }else{
                    $("#uptd_parent").hide()
                }
            })
        })

        var url = '{{ route("user.datatable") }}';
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
                { data: "name"},
                { data: "username"},
                { data: "role"},
                { data: "aksi" },
            ],
            "order": [[2, 'desc']],
            "pageLength": 25,
             createdRow: function (row, data, index) {
                var td = $(row).find("td:first");
                if(data.total_parent == 0){
                    td.removeClass('details-control');
                }
             }
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

        $('body').on('change','#opd_parent', function(){
            $("#uptd_parent_select_staff").html(' ')
            $.ajax({
                dataType: 'json',
                method: 'get',
                url : '{{ route("data.uptd") }}',
                data: {
                    "id" : $(this).val()
                }
            }).done(function(response){
                if(response.length > 0){
                    $("#uptd_parent_staff").show()
                    $.each(response, function(index, value){
                        $("#uptd_parent_select_staff").append('<option value=' + value.id + '>' + value.nama_uptd + '</option>');
                    })
                }else{
                    $("#uptd_parent_staff").hide()
                }
            })
        })
    })
</script>
@endpush
