@extends('frontend.master')
@section('content')
    @if(request()->perangkat == 'opd')
        @php
            $nama = \App\Models\Opd::where('id', request()->id)->first();
            $opd_file = \App\Models\OpdFile::where('opd_id', request()->id)->get();
        @endphp
    @else
        @php
            $nama = \App\Models\Uptd::select('nama_uptd as nama_opd','id','opd_id')->where('id', request()->id)->first();
            $opd_file = \App\Models\OpdFile::where('opd_id', $nama->opd_id)
            ->where('file_to_uptd', Auth::user()->uptd_parent)
            ->get();

            $check_file_uptd = \App\Models\OpdFile::where('opd_id', $nama->opd_id)->get();
            $pluck = $check_file_uptd->pluck('file_to_uptd');
            $impld = collect($pluck)->implode(',');
            $expld = explode(',', $impld);
            $arr = collect($expld);
            $check = $arr->contains(Auth::user()->uptd_parent);
        @endphp
    @endif
    <h4 class="mt-4 mb-4"><strong>List File {{ request()->perangkat == 'opd' ? $nama->nama_opd : $nama->nama_opd }}</strong></h4>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('dataset.upload') }}?id={{ request()->id }}">
                <button class="btn btn-success btn-sm"> <i class="fa fa-upload" aria-hidden="true"></i> Upload File</button>
            </a>
        </div>
        <!-- <div class="col-md-6 d-flex justify-content-end">
            <a href="{{ route('opdfile.download_all') }}?id={{ request()->id }}&nama_opd={{ $nama->nama_opd }}">
                <button class="btn btn-success btn-sm ">Download Bulk</button>
            </a>
        </div> -->
    </div>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item"><a href="{{ route('dataset') }}">Perangkat Daerah</a></li>
        <li class="breadcrumb-item active">Daftar File {{ $nama->nama_opd }}</li>
    </ol>
    <div class="row">
        @if($check != false)
        <div class="col-md-12 border-bottom mb-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nama Dataset</th>
                        <th scope="col">File</th>
                        <th scope="col">Diupload Oleh</th>
                        <th scope="col">Diupload Pada Tanggal</th>
                        <th scope="col">Download File</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($opd_file as $val)
                        <tr>
                            <td>{{ $val->judul }}</td>
                            <td>
                                <a href="{{ route('opdfile.download') }}?id={{$val->id}}&file={{ $val->file }}">
                                    <i class="fa fa-file" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>{{ $val->get_user ? $val->get_user->name : '' }}</td>
                            <td>{{ date('d M Y H:i', strtotime($val->created_at)) }}</td>
                            <td>
                                <a href="{{ route('opdfile.download') }}?id={{$val->id}}&file={{ $val->file }}">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-download" aria-hidden="true"></i> Download File</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else 
        <div class="col-md-12 border-bottom mb-3">
            <p><strong>Tidak ada data</strong></p>
        </div>
        @endif
    </div>
@endsection
