<?php

namespace App\Http\Controllers;

use Auth;
use DataTables;
use Illuminate\Http\Request;

class SektoralController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.sektoral.index');
    }

    public function store(Request $request)
    {
        $data = new \App\Models\OpdFile;
        $data->judul = $request["judul"];
        $data->opd_id = $request["opd_id"];
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $realname = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $new_name = $realname . "-" . time() . "." . $extension;
            $file->move(public_path('uploads'), $new_name);
            $data->file = $new_name;
            $data->file_to_uptd = $request["file_to_uptd"];
        }
        $data->status_file = 'asli';
        $data->keterangan = $request["keterangan"];
        $data->keterangan_table = $request["keterangan_table"];
        $data->created_by = Auth::user()->id;
        $data->upload_file_by = $request["upload_file_by"];
        $data->jenis_file = $request["jenis_file"];
        $data->save();

        // Notifikasi
        $notifikasi = new \App\Models\Notifikasi();
        $notifikasi->opd_id = $request["opd_id"];
        $notifikasi->opd_file_id = $data->id;
        $notifikasi->is_read = 0;
        $notifikasi->created_by = Auth::user()->id;
        $notifikasi->save();
        return redirect(route('sektoral.file', ['id' => $request["upload_file_by"]]));
    }

    public function datatable(Request $request)
    {
        if (Auth::user()->role != 'super admin') {
            $data = \App\Models\Opd::where('id', Auth::user()->opd_parent)->get();
        } else if (Auth::user()->role == 'super admin' && Auth::user()->username == 'bidang.ppm') {
            $data = \App\Models\Opd::whereIn('id', [37, 12, 22, 35, 33, 39, 34, 10, 16, 31, 19])->get();
        } else if (Auth::user()->role == 'super admin' && Auth::user()->username == 'bidang.psda') {
            $data = \App\Models\Opd::whereIn('id', [27, 28, 30, 29, 26, 24, 32])->get();
        } else if (Auth::user()->role == 'super admin' && Auth::user()->username == 'bidang.infrawil') {
            $data = \App\Models\Opd::whereIn('id', [18, 15, 14])
                ->orWhere('nama_opd', 'LIKE', '%Kecamatan%')
                ->get();
        } else if (Auth::user()->role == 'super admin' && Auth::user()->username == 'bidang.litbang') {
            $data = \App\Models\Opd::whereIn('id', [36, 9, 13, 20, 23, 38])->get();
        } else {
            $data = \App\Models\Opd::all();
        }
        return Datatables::of($data)
            ->addColumn('nama_opd', function ($val) {
                if ($val->get_file_sektoral->count() > 0) {
                    return '<a role="presentation" href=' . route('sektoral.file') . '?id=' . $val->id .'>' . $val->nama_opd . '</a>';
                } else {
                    return $val->nama_opd;
                }
            })
            ->addColumn('total_parent', function ($val) {
                return $val->get_uptd->count();
            })
            ->addColumn('status_file_dikirim', function ($val) {
                if ($val->get_file_sektoral_dikirim->count() > 0) {
                    return '<span class="badge badge-success">Tersedia</span>';
                } else {
                    return '<span class="badge badge-danger">Belum Tersedia</span>';
                }
            })
            ->addColumn('status_file_diterima', function ($val) {
                if ($val->get_file_sektoral_diterima->count() > 0) {
                    return '<span class="badge badge-success">Tersedia</span>';
                } else {
                    return '<span class="badge badge-danger">Belum Tersedia</span>';
                }
            })
            ->addColumn('last_upload', function ($val) {
                $last_upload = \App\Models\OpdFile::select('created_at')->orderBy('created_at', 'desc')->first();
                return $last_upload->created_at;
            })
            ->addColumn('aksi', function ($val) {
                return '<div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Aksi
                                <i class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></i>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" role="presentation" href=' . route('sektoral.file') . '?id=' . $val->id . '>Kelola File</a>
                            </div>
                        </div>';
            })
            ->rawColumns(['aksi', 'status_file_dikirim', 'status_file_diterima', 'nama_opd'])
            ->make(true);
    }
}
