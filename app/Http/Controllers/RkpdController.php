<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DataTables;

class RkpdController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.rkpd.index');
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
        $data->jenis_file = 'rkpd';
        $data->save();

        // Notifikasi
        $notifikasi = new \App\Models\Notifikasi();
        $notifikasi->opd_id = $request["opd_id"];
        $notifikasi->opd_file_id = $data->id;
        $notifikasi->is_read = 0;
        $notifikasi->created_by = Auth::user()->id;
        $notifikasi->save();
        return redirect(route('rkpd.file', ['id' => $request["upload_file_by"]]));
    }

    public function datatable()
    {
        if (Auth::user()->role != 'super admin') {
            $data = \App\Models\Opd::where('id', Auth::user()->opd_parent)->get();
        } else {
            $data = \App\Models\Opd::all();
        }
        return Datatables::of($data)
            ->addColumn('nama_opd', function ($val) {
                if ($val->get_file_rkpd->count() > 0) {
                    return '<a role="presentation" href=' . route('rkpd.file') . '?id=' . $val->id . '>' . $val->nama_opd . '</a>';
                } else {
                    return $val->nama_opd;
                }
            })
            ->addColumn('total_parent', function ($val) {
                return $val->get_uptd->count();
            })
            ->addColumn('status_file', function ($val) {
                if ($val->get_file_rkpd->count() > 0) {
                    return '<span class="badge badge-success">Tersedia</span>';
                } else {
                    return '<span class="badge badge-danger">Tidak Tersedia</span>';
                }
            })
            ->addColumn('last_upload', function ($val) {
                $last_upload = \App\Models\OpdFile::select('created_at')->orderBy('created_at', 'desc')->first();
                return $last_upload->created_at;
            })
            ->addColumn('aksi', function ($val) {
                return '<div class="dropdown d-flex justify-content-end">
                            <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Aksi</button>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" role="presentation" href=' . route('rkpd.file') . '?id=' . $val->id . '>Kelola File</a>
                            </div>
                        </div>';
            })
            ->rawColumns(['aksi', 'status_file', 'nama_opd'])
            ->make(true);
    }
}
