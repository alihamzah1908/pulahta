@extends('admin.master')
@section('content')
<div class="container-fluid">
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item"><a href="{{ route('opd.index') }}">Perangkat Daerah</a></li>
        <li class="breadcrumb-item"><a href="{{ route('opd.file') }}?id={{ request()->id }}">Dataset</a></li>
        <li class="breadcrumb-item active">Upload File</li>
    </ol>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Upload File Perangkat Daerah</h5>
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
                            <label class="bmd-label-floating"><strong>Jenis File</strong></label>
                            <select name="jenis_file" class="form-control" required="true">
                                <option value="">Pilih</option>
                                <option value="rkpd">RKPD</option>
                                <option value="lkpj">LKPJ</option>
                                <option value="Sektoral">Sektoral</option>
                                <option value="dda">Daerah Dalam Angka (DDA)</option>
                                <option value="Lainya">Lainya</option>
                            </select>
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
                            <input type="file" id="file" class="form-control" name="file" required>
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
                        <button type="submit" class="btn btn-primary pull-right btn-sm">Simpan</button>
                        <div class="clearfix"></div>
                    <div>
                </div>
            </form>
        </div>
    </div>
    
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('body').on('change', '#file', function(){
            var imgbytes = this.files[0].size;
            var imgkbytes = Math.round(parseInt(imgbytes) / 1024);
            if(imgkbytes > 5000){
                $("#file").val('')
                alert("Ukuran file terlalu besar, mohon upload file dengan ukuran tidak lebih dari 5Mb")
                return false;
            }
        })
    })
</script>
@endpush