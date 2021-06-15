@extends('admin.master')
@section('content')
<style>
    .highcharts-figure, .highcharts-data-table table {
        min-width: 310px; 
        max-width: 800px;
        margin: 1em auto;
    }

    #container {
        height: 500px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }
    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }
    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }
    .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
        padding: 0.5em;
    }
    .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }
    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
</style>
<!-- <h5 class="card-title mt-4 mb-4">Selamat Datang di Aplikasi Pengumpulan Data</h5> -->
<div class="row mt-4">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                            Total Upload</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 total-upload">{{ \App\Models\OpdFile::count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-upload fa-2x text-primary" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                            Total File</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 total-file">{{ \App\Models\OpdFile::count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-file fa-2x text-success" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                            Total Download</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 total-download">{{ \App\Models\OpdFile::select('total_download')->pluck('total_download')->sum() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-download fa-2x text-danger" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="container"></div>
@endsection
@push('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $.ajax({
        dataType: 'json',
        method: 'get',
        url : '{{ route("data.perangkat") }}',
        beforeSend: function(){
            $("#container").html('Loading ...')
        },
    }).done(function(response){
        var nama_kelompok = [];
        var alias_opd = [];
        var jumlah = [];
        var upload = [];
        var download = [];
        $.each(response, function(index, value){
            nama_kelompok.push(value.nama_opd)
            jumlah.push(value.total)
            upload.push(value.upload)
            download.push(value.download)
            alias_opd.push(value.alias_opd)
        })
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Rata - rata total file yang sudah diupload dan download'
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

            }, {
                name: 'Total File',
                data: jumlah

            },{
                name: 'Download',
                data: download

            }]
        });
    })
</script>
@endpush