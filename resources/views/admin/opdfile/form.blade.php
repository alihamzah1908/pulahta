@extends('admin.master')
@section('content')
<div class="container-fluid">
    <h3 class="mt-4 mb-3">Form Opd File</h3>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Tambah Data</h4>
            <!-- <p class="card-category">Complete your profile</p> -->
        </div>
        <div class="card-body">
            <form action="{{ route('opdfile.store') }}" method="post" enctype="multipart/form-data">
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
                            <label class="bmd-label-floating"><strong>Nama OPD</strong></label>
                            <select name="nama_opd" class="form-control">
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
                @if(Auth::user()->role == 'Admin')
                <div class="row">
                    <div class="col-md-5">
                        <label class="bmd-label-floating"><strong>Nama Uptd </strong></label>
                        <div class="form-group">
                            @php 
                            $uptd = \App\Models\Uptd::where('opd_id', Auth::user()->opd_parent)->get();
                            @endphp
                            @foreach($uptd as $val)
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="file_to_uptd[]" value="{{ $val->id }}"> {{ $val->nama_uptd }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="bmd-label-floating"><strong>Deskripsi File </strong></label>
                            <textarea name="keterangan" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row pull-right">
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                        <div class="clearfix"></div>
                    <div>
                </div>
            </form>
        </div>
    </div>
    
</div>
@endsection