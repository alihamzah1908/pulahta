@extends('admin.master')
@section('content')
<div class="container-fluid">
    @php 
    $metadata = \App\Models\KamusData::where('opd_file_id', request()->id)->get();
    $opd_file = \App\Models\OpdFile::where('id', request()->id)->first();
    @endphp
    <h3 class="mt-4 mb-3">Form Kamus Data</h3>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item"><a href="{{ route('opd.file') }}?id={{ $opd_file->opd_id }}">Data File </a></li>
        <li class="breadcrumb-item active">Kamus Data</li>
    </ol>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Kamus Data</h4>
            <!-- <p class="card-category">Complete your profile</p> -->
        </div>
        <div class="card-body">
            <form action="{{ route('upload.metadata') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(count($metadata) == 0)
                <div class="kolom">
                    <h5 class="border-bottom mb-3">Field 1</h5>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="bmd-label-floating"><strong>Tipe</strong></label>
                                <select name="tipe[]" class="form-control">
                                    <option value="text">text</option>
                                    <option value="numeric">numeric</option>
                                    <option value="timestamp">timestamp</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="bmd-label-floating"><strong>Label </strong></label>
                                <input type="text" class="form-control" name="label[]" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="bmd-label-floating"><strong>Deskripsi </strong></label>
                                <textarea name="keterangan[]" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                @else 
                @php 
                $i = 1;
                @endphp
                @foreach($metadata as $val)
                <div id="kolom-edit">
                    <h5 class="border-bottom mb-3">Field {{ $i }}</h5>
                    <input type="hidden" name="id_metadata[]" value="{{ $val->id }}"/>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="bmd-label-floating"><strong>Tipe</strong></label>
                                <select name="tipe[]" class="form-control">
                                    <option value="text"{{ $val->tipe == 'text' ? ' selected' : '' }}>text</option>
                                    <option value="numeric"{{ $val->tipe == 'numeric' ? ' selected' : '' }}>numeric</option>
                                    <option value="timestamp"{{ $val->tipe == 'timestamp' ? ' selected' : '' }}>timestamp</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="bmd-label-floating"><strong>Label </strong></label>
                                <input type="text" class="form-control" name="label[]" value="{{ $val->label }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="bmd-label-floating"><strong>Deskripsi </strong></label>
                                <textarea name="keterangan[]" class="form-control">{{ $val->kegunaan }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                @php 
                $i++
                @endphp
                @endforeach
                @endif
                <div class="row">
                    <div class="col-md-5">
                        <input name="file_id" value="{{ request()->id}} " type="hidden"/>
                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                        @if(count($metadata) == 0)
                        <button type="button" class="btn btn-success pull-right mr-2 tambah-kolom"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Form</button>
                        @endif
                        <div class="clearfix"></div>
                    <div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        var id = 2;
        $('body').on('click','.tambah-kolom', function(){
            var body = '<div class="form' + id + '">';
            body += '<h5 class="border-bottom mb-3">Field ' + id + '</h5>';
            body += '<div class="row">';
            body += '<div class="col-md-5">';
            body += '<div class="form-group">';
            body += '<label class="bmd-label-floating"><strong>Tipe</strong></label>';
            body += '<select name="tipe[]" class="form-control">';
            body += '<option value="text">text</option>';
            body += '<option value="numeric">numeric</option>';
            body += '<option value="timestamp">timestamp</option>';
            body += '</select>';
            body += '</div>';
            body += '</div>';
            body += '<div class="col-md-2 p-4 mt-1">';
            body += '<a href="javascript:void(0)" class="hapus-form" data-bind='+ id +'><span class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i> Hapus Form</span></a>';
            body += '</div>';
            body += '</div>';
            body += '<div class="row">';
            body += '<div class="col-md-5">';
            body += '<div class="form-group">';
            body += '<label class="bmd-label-floating"><strong>Label </strong></label>';
            body += '<input type="text" class="form-control" name="label[]" required>';
            body += '</div>';
            body += '</div>';
            body += '</div>';
            body += '<div class="row">';
            body += '<div class="col-md-5">';
            body += '<div class="form-group">';
            body += '<label class="bmd-label-floating"><strong>Deskripsi </strong></label>';
            body += '<textarea name="keterangan[]" class="form-control"></textarea>';
            body += '</div>';
            body += '</div>';
            body += '</div>';
            body += '</div>';
            $('.kolom').append(body)
            id++;
        })
        var id_edit = 5;
        $('body').on('click','.tambah-kolom', function(){
            var body = '<div class="form'+ id_edit+ '">';
            body += '<h5 class="border-bottom mb-3">Field ' + id_edit + '</h5>';
            body += '<input type="text" name="id_metadata[]" value='+ id_edit + '>';
            body += '<div class="row">';
            body += '<div class="col-md-5">';
            body += '<div class="form-group">';
            body += '<label class="bmd-label-floating"><strong>Tipe</strong></label>';
            body += '<select name="tipe[]" class="form-control">';
            body += '<option value="text">text</option>';
            body += '<option value="numeric">numeric</option>';
            body += '<option value="timestamp">timestamp</option>';
            body += '</select>';
            body += '</div>';
            body += '</div>';
            body += '<div class="col-md-2 p-4 mt-1">';
            body += '<a href="javascript:void(0)" class="hapus-form" data-bind='+ id +'><span class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i> Hapus Form</span></a>';
            body += '</div>';
            body += '</div>';
            body += '<div class="row">';
            body += '<div class="col-md-5">';
            body += '<div class="form-group">';
            body += '<label class="bmd-label-floating"><strong>Label </strong></label>';
            body += '<input type="text" class="form-control" name="label[]" required>';
            body += '</div>';
            body += '</div>';
            body += '</div>';
            body += '<div class="row">';
            body += '<div class="col-md-5">';
            body += '<div class="form-group">';
            body += '<label class="bmd-label-floating"><strong>Deskripsi </strong></label>';
            body += '<textarea name="keterangan[]" class="form-control"></textarea>';
            body += '</div>';
            body += '</div>';
            body += '</div>';
            body += '</div>';
            $('#kolom-edit').append(body)
            id_edit++;
        })

        $('body').on('click','.hapus-form', function(){
            var id = $(this).attr('data-bind');
            $('.form'+ id +'').remove();
        })
    })
</script>
@endpush