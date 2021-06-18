@extends('admin.master')
@section('content')
<div class="container-fluid">
    <h3 class="mt-4 mb-3">Form Kamus Data</h3>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item"><a href="{{ route('opd.index') }}">Data File </a></li>
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
                @for($i = 1; $i < 3; $i++)
                <h5>Field {{ $i }} </h5>
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
                <div class="row border-bottom mb-2">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="bmd-label-floating"><strong>Deskripsi </strong></label>
                            <textarea name="keterangan[]" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                @endfor
                <div class="row pull-right">
                    <div class="col-md-5">
                        <input name="file_id" value="{{ request()->id}} " type="hidden"/>
                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                        <div class="clearfix"></div>
                    <div>
                </div>
            </form>
        </div>
    </div>
    
</div>
@endsection