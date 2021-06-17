@extends('frontend.master')
@section('content')
@if(request()->preangkat == 'opd')
    @php
        $nama = \App\Models\Opd::where('id', request()->id)->first();
    @endphp
@else
    @php
        $nama = \App\Models\Uptd::select('nama_uptd as nama_opd','opd_id','id')->where('id', request()->id)->first();
    @endphp
@endif
<h3 class="mt-4 mb-4"><strong>Upload File {{ $nama->nama_opd }}</strong></h3>
<ol class="breadcrumb mb-4 mt-4">
    <li class="breadcrumb-item">
        <a href="{{ route('dataset') }}">{{ request()->preangkat == 'opd' ? ' Perangkat Daerah' : ' Uptd' }}</a>
    </li>
    <li class="breadcrumb-item active">Upload File {{ $nama->nama_opd }}</li>
</ol>
<form action="{{ route('upload.file') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label class="bmd-label-floating">Nama File</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label class="bmd-label-floating">Nama Perangkat Daerah</label>
                <select name="nama_opd" class="form-control" disabled>
                    <option value="">Pilih Opd</option>
                    @php 
                    $opd = \App\Models\Opd::all();
                    @endphp
                    @foreach($opd as $val)
                        @if(request()->perangkat == 'opd')
                            <option value="{{ $val->id }}"{{$val->id == request()->id ? ' selected' : ''}}>{{ $val->nama_opd }}</option>
                        @else 
                            <option value="{{ $val->id }}"{{$val->id == $nama->opd_id ? ' selected' : ''}}>{{ $val->nama_opd }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label class="bmd-label-floating">File </label>
                <input type="file" class="form-control" name="file" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label class="bmd-label-floating">Deskripsi File </label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>
        </div>
    </div>
    <div class="row pull-right">
        <div class="col-md-5">
            <input type="hidden" name="opd_id" value="{{ $nama->opd_id }}" />
            <input type="hidden" name="file_to_uptd" value="{{ $nama->id }}" />
            <input type="hidden" name="upload_file_by" value="{{ request()->id }}" />
            <input type="hidden" name="uptd_id" value="{{ Auth::user()->uptd_parent }}" />
            <button type="submit" class="btn btn-primary pull-right">Simpan</button>
            <div class="clearfix"></div>
        <div>
    </div>
</form>
@endsection