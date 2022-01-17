@extends('admin.master')
@section('content')
<div class="container-fluid">
    @if(request()->id)
        @php 
        $opd = \App\Models\Opd::find(request()->id);
        @endphp
        <h5 class="mt-4 mb-3">Form Tambah User OPD</h5>
    @endif
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item"><a href="{{ route('opd.index') }}">Perangkat Daerah</a></li>
        <li class="breadcrumb-item active">Tambah User OPD</li>
    </ol>
    <div class="card">
        <div class="card-header card-header-primary">
            <h5 class="card-title">Tambah Data</h5>
            <!-- <p class="card-category">Complete your profile</p> -->
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('opd.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama Perangkat Daerah</label>
                            <input type="text" class="form-control" name="nama" value="{{ $opd ? $opd->nama_opd : '' }}" required disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama User OPD</label>
                            <input type="text" class="form-control" name="uptd" value="" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="id_opd" value="{{ $opd ? $opd->id : '' }}" />
                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection