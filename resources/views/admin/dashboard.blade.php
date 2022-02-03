@extends('admin.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row page-title align-items-center">
            <div class="col-sm-4 col-xl-6">
                <h4 class="mb-1 mt-0">Dashboard Summary</h4>
            </div>
        </div>
        <!-- <iframe width="600" height="450" src="https://datastudio.google.com/embed/reporting/92744aa2-a1ee-4876-a837-e4d7dd752e50/page/GaAfC" frameborder="0" style="border:0" allowfullscreen></iframe> -->
        <!-- content -->
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="media p-3">
                            <div class="media-body">
                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total Upload</span>
                                <h2 class="mb-0">
                                    @php 
                                    if(Auth::user()->role == 'super admin'){
                                        $upload = \App\Models\OpdFile::count();
                                    }else{
                                        $upload = \App\Models\OpdFile::where('opd_id', Auth::user()->opd_parent)->where('created_by', Auth::user()->id)->count();
                                    }
                                    @endphp
                                    {{ $upload }}
                                </h2>
                            </div>
                            <div class="align-self-center">
                                <div id="today-revenue-chart" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="media p-3">
                            <div class="media-body">
                                    @php 
                                    if(Auth::user()->role == 'super admin'){
                                        $download = \App\Models\OpdFile::select('total_download')->pluck('total_download')->sum();
                                    }else{
                                        $download = \App\Models\OpdFile::where('opd_id', Auth::user()->opd_parent)->pluck('total_download')->sum();
                                    }
                                    @endphp
                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total Download</span>
                                <h2 class="mb-0">{{ $download }}</h2>
                            </div>
                            <div class="align-self-center">
                                <div id="today-product-sold-chart" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="media p-3">
                            <div class="media-body">
                                @php 
                                if(Auth::user()->role == 'super admin'){
                                    $total = \App\Models\OpdFile::count();
                                }else{
                                    $total = \App\Models\OpdFile::where('opd_id', Auth::user()->opd_parent)->count();
                                }
                                @endphp
                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total File</span>
                                <h2 class="mb-0">{{ $total }}</h2>
                            </div>
                            <div class="align-self-center">
                                <div id="today-new-customer-chart" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="media p-3">
                            <div class="media-body">
                                @php 
                                if(Auth::user()->role == 'super admin'){
                                    $verifikasi = \App\Models\OpdFile::where('status_file','verifikasi')->count();
                                }else{
                                    $verifikasi = \App\Models\OpdFile::where('opd_id', Auth::user()->opd_parent)->where('status_file','verifikasi')->count();
                                }
                                @endphp
                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total File Terverfikasi</span>
                                <h2 class="mb-0">{{ $verifikasi }}</h2>
                            </div>
                            <div class="align-self-center">
                                <div id="today-new-visitors-chart" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="media p-3">
                            <div class="media-body">
                                @php 
                                if(Auth::user()->role == 'super admin'){
                                    $publikasi = \App\Models\OpdFile::where('status_file','publikasi')->count();
                                }else{
                                    $publikasi = \App\Models\OpdFile::where('opd_id', Auth::user()->opd_parent)->where('status_file','publikasi')->count();
                                }
                                @endphp
                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total File Terpublikasi</span>
                                <h2 class="mb-0">{{ $publikasi }}</h2>
                            </div>
                            <div class="align-self-center">
                                <div id="today-new-visitors-chart" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- stats + charts -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pb-0">
                        <!-- <h5 class="card-title header-title">Grafik total file yang sudah diupload dan download</h5> -->
                        @if(Auth::user()->role == 'super admin')
                            <div id="container-opd" class="mt-4"></div>
                        @elseif(Auth::user()->role == 'Admin')
                            <div id="container-admin" class="mt-4"></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if(Auth::user()->role == 'super admin' && Auth::user()->username != 'bidang.ppm' && Auth::user()->username != 'bidang.litbang')
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pb-0">
                        <div id="container-kecamatan" class="mt-4"></div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(Auth::user()->username == 'statistik')
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-7 border">
                                <h5>Daftar nama OPD yang sudah mengirimkan file</h5>
                            </div>
                            <div class="col-md-5 d-flex justify-content-end">  
                                <a href="{{ url('/download/all') }}">
                                    <button class="btn-sm btn-success">download all file</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <table class="table dt-responsive nowrap" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama opd</th>
                                    <th>Jenis file</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                $filediterima = \App\Models\OpdFile::groupBy('jenis_file','opd_id')
                                    ->whereNotIn('created_by', array(1, 4, 46, 74, 75, 76, 77))
                                    ->get();
                                @endphp 
                                @foreach($filediterima as $val)
                                    <tr>
                                        <td>
                                            @if($val->jenis_file == 'lkpj')
                                                <a href="{{ route('lkpj.file') }}?id={{ $val->opd_id }}">
                                                    {{ $val->get_opd->nama_opd }}
                                                </a>
                                            @elseif($val->jenis_file == 'rkpd')
                                                <a href="{{ route('rkpd.file') }}?id={{ $val->opd_id }}">
                                                    {{ $val->get_opd->nama_opd }}
                                                </a>
                                            @else 
                                                <a href="{{ route('sektoral.file') }}?id={{ $val->opd_id }}">
                                                    {{ $val->get_opd->nama_opd }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{ $val->jenis_file }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- row -->
    </div>
</div>
@endsection
@push('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    $(document).ready(function(){    
        // table list opd yang sudah mengumpulkan file
        $('#dataTable').dataTable({
            language: {
                paginate: {
                    previous: "<i class='uil uil-angle-left'>",
                    next: "<i class='uil uil-angle-right'>"
                    }
            },
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            },
            "pageLength": 10,
        });
    })
</script>
<script>
    //grafik user role user admin
    $.ajax({
        dataType: 'json',
        method: 'get',
        url : '{{ route("data.perangkat") }}',
        data: {
            'user' : 'opd'
        },
        beforeSend: function(){
            $("#container-opd").html('Loading ...')
        },
    }).done(function(response){
        var nama_kelompok = [];
        var alias_opd = [];
        var jumlah = [];
        var upload = [];
        var download = [];
        var publikasi = [];
        $.each(response, function(index, value){
            nama_kelompok.push(value.nama_opd)
            jumlah.push(value.total)
            upload.push(value.upload)
            download.push(value.download)
            alias_opd.push(value.alias_opd)
            publikasi.push(value.publikasi)
        })
        Highcharts.chart('container-opd', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Total file yang sudah diupload dan download'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: alias_opd,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total '
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Upload',
                data: upload

            },{
                name: 'Terpublikasi',
                data: publikasi

            }, {
                name: 'Total File',
                data: jumlah

            },{
                name: 'Download',
                data: download

            }]
        });
    })


    //grafik user role user admin
    $.ajax({
        dataType: 'json',
        method: 'get',
        url : '{{ route("data.perangkat") }}',
        data: {
            'user' : 'kecamatan'
        },
        beforeSend: function(){
            $("#container-kecamatan").html('Loading ...')
        },
    }).done(function(response){
        var nama_kelompok = [];
        var alias_opd = [];
        var jumlah = [];
        var upload = [];
        var download = [];
        var publikasi = [];
        $.each(response, function(index, value){
            nama_kelompok.push(value.nama_opd)
            jumlah.push(value.total)
            upload.push(value.upload)
            download.push(value.download)
            alias_opd.push(value.alias_opd)
            publikasi.push(value.publikasi)
        })
        Highcharts.chart('container-kecamatan', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Total file yang sudah diupload dan download'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: alias_opd,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total '
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Upload',
                data: upload

            },{
                name: 'Terpublikasi',
                data: publikasi

            }, {
                name: 'Total File',
                data: jumlah

            },{
                name: 'Download',
                data: download

            }]
        });
    })

    //grafik user role admin
    $.ajax({
        dataType: 'json',
        method: 'get',
        url : '{{ route("data.perangkat") }}',
        beforeSend: function(){
            $("#container-admin").html('Loading ...')
        },
    }).done(function(response){
        Highcharts.chart('container-admin', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Statistik file ' + "{{ Auth::user()->name }}"
            },
            subtitle: {
                text: ''
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
            },

            series: [
                {
                    name: "Browsers",
                    colorByPoint: true,
                    data: [
                        {
                            name: "Total Upload",
                            y: response.total_upload,
                            drilldown: "Total Upload"
                        },
                        {
                            name: "Total Download",
                            y: response.total_download,
                            drilldown: "Total Download"
                        },
                        {
                            name: "Total Verifikasi",
                            y: response.total_verifikasi,
                            drilldown: "Total Verifikasi"
                        },
                        {
                            name: "Total Publikasi",
                            y: response.total_publikasi,
                            drilldown: "Total Publikasi"
                        }
                    ]
                }
            ],
            drilldown: {
                breadcrumbs: {
                    position: {
                        align: 'right'
                    }
                },
                series: []
            }
        });
    })
</script>
@endpush
