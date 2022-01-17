@extends('admin.master')
@section('content')
<div class="container-fluid">
    <h5 class="mt-4 mb-3">Upload file Sektoral</h5>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item"><a href="{{ route('rkpd') }}">Sektoral</a></li>
        <li class="breadcrumb-item active">Upload file Sektoral</li>
    </ol>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Upload file sektoral</h5>
            <!-- <p class="card-category">Complete your profile</p> -->
        </div>
        <div class="card-body">
            <form action="{{ route('sektoral.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="bmd-label-floating"><strong>Nama File</strong></label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="hidden" name="nama_opd" value="{{ request()->id }}" />
                            <label class="bmd-label-floating"><strong>Nama OPD</strong></label>
                            <select name="nama_opd" class="form-control" disabled>
                                <option value="">Pilih Opd</option>
                                @php 
                                $opd = \App\Models\Opd::all();
                                @endphp
                                @foreach($opd as $val)
                                    <option value="{{ $val->id }}"{{$val->id == request()->id ? ' selected' : ''}}>{{ $val->nama_opd }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="bmd-label-floating"><strong>File </strong></label>
                            <input type="file" class="form-control" name="file" required>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->role == 'Admin' && request()->type != 'staff')
                <div class="row">
                    @php 
                    $uptd = \App\Models\Uptd::where('opd_id', Auth::user()->opd_parent)->get();
                    @endphp
                    <div class="col-md-5">
                        @if($uptd->count() > 0)
                            <label class="bmd-label-floating"><strong>Nama Uptd </strong></label>
                            <div class="form-group">
                                @foreach($uptd as $val)
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="file_to_uptd[]" value="{{ $val->id }}"> {{ $val->nama_uptd }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="bmd-label-floating"><strong>Deskripsi Judul </strong></label>
                            <textarea name="keterangan" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="bmd-label-floating"><strong>Deskripsi Tabel </strong></label>
                            <textarea name="keterangan_table" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        @if(request()->type == 'staff')
                            <input type="hidden" name="upload_file_by" value="{{ request()->uptd_id }}" />
                        @else 
                            <input type="hidden" name="upload_file_by" value="{{ request()->id }}" />
                        @endif
                        <input type="hidden" name="opd_id" value="{{ request()->id }}" />
                        <button type="submit" class="btn btn-primary pull-right btn-sm">Simpan</button>
                        <div class="clearfix"></div>
                    <div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection