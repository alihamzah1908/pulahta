@extends('admin.master')
@section('content')
<div class="container-fluid mt-4">
    <form method="POST" action="{{ route('proses.ubah_password') }}" enctype="multipart/form-data" id="import_participan">
        @csrf
        <div class="card">
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card-header card-header-primary">
                <h5 class="card-title">Ubah Password</h5>
                <!-- <p class="card-category">Complete your profile</p> -->
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label><strong>Nama User</strong></label>
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label><strong>Password Lama</strong></label>
                            <input type="password" class="form-control" name="password_lama" value=""/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label><strong>Password Baru</strong></label>
                            <input type="password" class="form-control" name="password_baru" value=""/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label><strong>Konfirmasi Password</strong></label>
                            <input type="password" class="form-control" name="konfirmasi_password" value=""/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary pull-right btn-sm">Ubah Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection