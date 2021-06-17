@extends('admin.master')
@section('content')
<div class="container-fluid">
    @if(request()->id)
        @php 
        $opd = \App\Models\Opd::find(request()->id);
        @endphp
        <h3 class="mt-4 mb-3">{{ request()->type ? 'Edit User Perangkat Daerah' : 'Edit Perangkat Daerah' }}</h3>
        <ol class="breadcrumb mb-4 mt-4">
            <li class="breadcrumb-item"><a href="{{ route('opd.index') }}">Perangkat Daerah</a></li>
            <li class="breadcrumb-item active">{{ request()->type ? 'Edit User Perangkat Daerah' : 'Edit Perangkat Daerah' }}</li>
        </ol>
    @else 
        @php 
        $opd = '';
        @endphp
        <h3 class="mt-4 mb-3">{{ request()->type ? 'Tambah User Perangkat Daerah' : 'Tambah Perangkat Daerah' }}</h3>
        <ol class="breadcrumb mb-4 mt-4">
            <li class="breadcrumb-item"><a href="{{ route('opd.index') }}">Perangkat Daerah</a></li>
            <li class="breadcrumb-item active">{{ request()->type ? 'Tambah User Perangkat Daerah' : 'Tambah Perangkat Daerah' }}</li>
        </ol>
    @endif
    @if(request()->type == 'staff')
        @php 
            $uptd = \App\Models\Uptd::find(request()->id);
        @endphp
    @endif
    <div class="card">
        <div class="card-header card-header-primary">
            <h5 class="card-title">{{ request()->id ? 'Edit Data ' : 'Tambah Data '}} </h5>
            <!-- <p class="card-category">Complete your profile</p> -->
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('opd.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">{{ request()->type != 'staff' ? 'Nama Perangkat Daerah ' : 'Nama User OPD ' }}</label>
                            @if(request()->type != 'staff')
                                <input type="text" class="form-control" name="nama" value="{{ $opd ? $opd->nama_opd : '' }}" required>
                            @else
                                <input type="text" class="form-control" name="nama" value="{{ $uptd ? $uptd->nama_uptd : '' }}" required>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            @if(request()->type != 'staff')
                                <label class="bmd-label-floating">Nama Alias Perangkat Daerah</label>
                                <input type="text" class="form-control" name="alias_opd" value="{{ $opd ? $opd->alias_opd : '' }}" required>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        @if(request()->type == 'staff')
                            <input type="hidden" name="type" value="{{ request()->type }}" />
                            <input type="hidden" name="uptd_opd_id" value="{{ $uptd ? $uptd->opd_id : '' }}" />
                            <input type="hidden" name="id" value="{{ request()->id }}" />
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                        @else 
                            @if(request()->id)
                                <input type="hidden" name="id" value="{{ $opd ? $opd->id : '' }}" />
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                            @else 
                                <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                            @endif
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection