@extends('admin.master')
@section('content')
<style>
    .portfolio-menu{
	    text-align:center;
    }
    .portfolio-menu ul li{
        display:inline-block;
        margin:0;
        list-style:none;
        padding:10px 15px;
        cursor:pointer;
        -webkit-transition:all 05s ease;
        -moz-transition:all 05s ease;
        -ms-transition:all 05s ease;
        -o-transition:all 05s ease;
        transition:all .5s ease;
    }

    .portfolio-item{
        /*width:100%;*/
    }
    .portfolio-item .item{
        /*width:303px;*/
        float:left;
        margin-bottom:10px;
    }
</style>
<div class="container-fluid">
    @php 
    $opd = \App\Models\OpdFile::where('id', request()->id)->first();
    @endphp
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb mb-4 mt-4">
                <li class="breadcrumb-item"><a href="{{ route('lkpj') }}">Lkpj</a></li>
                <li class="breadcrumb-item"><a href="{{ route('lkpj.file') }}?id={{ $opd->opd_id }}">Dataset</a></li>
                <li class="breadcrumb-item active">Evidence</li>
            </ol>
        </div>
    </div>
    <div class="card-header">
        <h5 class="card-title">Evidence {{ $opd->judul }}</h5>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#home" data-toggle="tab" aria-expanded="true"
                                class="nav-link active">
                                <span class="d-block d-sm-none"><i class="uil-home-alt"></i></span>
                                <span class="d-none d-sm-block">Evidence</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile" data-toggle="tab" aria-expanded="false"
                                class="nav-link">
                                <span class="d-block d-sm-none"><i class="uil-user"></i></span>
                                <span class="d-none d-sm-block">Upload Evidence</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane show active" id="home">
                            <div class="portfolio-item row">
                                @php 
                                $image = \App\Models\Evidence::where('dataset_file_id', request()->id)->get();
                                @endphp
                                @foreach($image as $img)
                                @php 
                                $ext = pathinfo($img->file, PATHINFO_EXTENSION);
                                $allowed = array('gif', 'png', 'jpg','jpeg');
                                @endphp
                                @if(in_array($ext, $allowed)) 
                                <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                                    <a href="{{ asset('evidence') }}/{{ $img->file }}" class="fancylight popup-btn" data-fancybox-group="light"> 
                                        <img class="img-fluid" src="{{ asset('evidence') }}/{{ $img->file }}" alt="">
                                    </a>
                                </div>
                                @else
                                <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                                    <a href="{{ asset('evidence') }}/{{ $img->file }}" target="blank"> 
                                        <p> {{ $img->file }}</p>
                                    </a>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane" id="profile">
                            <h4 class="header-title mt-0 mb-1">Dropzone File Upload</h4>
                            <p class="sub-header">
                                DropzoneJS is an open source library that provides drag’n’drop file uploads with image previews.
                            </p>

                            <form action="{{ route('evidence.store') }}" method="post" class="dropzone" id="myAwesomeDropzone">
                                @csrf
                                <div class="fallback">
                                    <input name="file" type="file" id="file" multiple />
                                </div>
                                <input name="opd_id" type="hidden" value="{{ $opd->opd_id }}" />
                                    <input name="dataset_file_id" type="hidden" value="{{ $opd->id }}" />
                                <div class="dz-message needsclick">
                                    <i class="h1 text-muted  uil-cloud-upload"></i>
                                    <h3>Drop files here or click to upload.</h3>
                                    <span class="text-muted font-13">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $('.portfolio-menu ul li').click(function(){
        $('.portfolio-menu ul li').removeClass('active');
        $(this).addClass('active');
        
        var selector = $(this).attr('data-filter');
        $('.portfolio-item').isotope({
            filter:selector
        });
        return  false;
    });
    $(document).ready(function(){
        var popup_btn = $('.popup-btn');
        popup_btn.magnificPopup({
            type : 'image',
            gallery : {
                enabled : true
            }
        });
        $('#dataTable').dataTable({
            "order": [[4, 'desc']],
            "pageLength": 25,
        });
        $('body').on('click', '.delete', function(){
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr('data-bind');
                    var file = $(this).attr('data-file');
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        dataType: 'json',
                        method: 'DELETE',
                        url: '{{ route("opd_file.delete") }}',
                        data: {
                            "id": id,
                            "file" : file,
                            "_token" : token,
                        }
                    }).done(function(){
                        Swal.fire(
                            'Terhapus!',
                            'Data sudah terhapus.',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.reload()
                            }
                        })
                    })
                }
            })
        })

        $('body').on('submit', '#myAwesomeDropzone', function(e){
            console.log(e)
        });
    })
</script>
@endpush