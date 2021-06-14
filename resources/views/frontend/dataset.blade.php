@extends('frontend.master')
@section('content')
    <h4 class="mt-4 mb-4" style="margin-top: 100px;"><strong>Perangkat Daerah Kabupaten Ciamis</strong></h4>
    @if(Auth::user()->uptd_parent == '')
        @php 
            $nama_opd = request()->nama_opd;
            $type = 'opd';
            $opd = \App\Models\Opd::orderBy('nama_opd','asc')
                ->where('nama_opd', 'LIKE', "%{$nama_opd}%") 
                ->where('id', Auth::user()->opd_parent)
                ->get();
            $opd_file = \App\Models\OpdFile::where('opd_id', Auth::user()->opd_parent)->count();
        @endphp
    @else 
        @php 
            $nama_opd = request()->nama_opd;
            $type = 'uptd';
            $opd = \App\Models\Uptd::select('nama_uptd as nama_opd','id','opd_id')->orderBy('nama_uptd','asc')
                ->where('nama_uptd', 'LIKE', "%{$nama_opd}%") 
                ->where('id', Auth::user()->uptd_parent)
                ->get();
            $opd_file = \App\Models\OpdFile::where('opd_id', Auth::user()->opd_parent)->count();
            
            $check_file_uptd = \App\Models\OpdFile::where('opd_id', Auth::user()->opd_parent)->get();
            $pluck = $check_file_uptd->pluck('file_to_uptd');
            $impld = collect($pluck)->implode(',');
            $expld = explode(',', $impld);
            $arr = collect($expld);
            $check = $arr->contains(Auth::user()->uptd_parent);
        @endphp
    @endif
    @foreach($opd as $val)
    <div class="row">
        <div class="col-md-12 border-bottom mb-4">
            <div class="row">
                <div class="col-md-6">
                    <h5>{{ $val->nama_opd }}</h5>
                </div>
                <div class="col-md-6 d-flex d-flex justify-content-end mb-3">
                    @if($opd_file > 0 && $check != false)
                        <a href="{{ route('dataset.detail') }}?id={{ $val->id }}&perangkat={{ $type }}">
                            <button class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i> Lihat File</button>
                        </a>
                    @endif
                    <a href="{{ route('dataset.upload') }}?id={{ $val->id }}&perangkat={{ $type }}">
                        <button class="btn btn-success btn-sm ml-3"><i class="fa fa-upload" aria-hidden="true"></i> Upload File</button>
                    </a>
                </div>
            </div>
            <!-- <p>Nama File</p> -->
        </div>
    </div>
    @endforeach
@endsection
