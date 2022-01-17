<?php

namespace App\Http\Controllers;

use Auth;
use DataTables;
use Illuminate\Http\Request;

class OpdController extends Controller
{

    public function index()
    {
        return view('admin.opd.index');
    }

    public function get_perangkat(Request $request)
    {
        if (Auth::user()->role == 'super admin') {
            if ($request["user"] == 'kecamatan') {
                $opd = \App\Models\Opd::orderBy('alias_opd', 'asc')
                    ->where('nama_opd', 'LIKE', '%kecamatan%')
                    ->get();
            } else if ($request["user"] == 'opd') {
                $opd = \App\Models\Opd::orderBy('alias_opd', 'asc')
                    ->where('nama_opd', 'NOT LIKE', '%kecamatan%')
                    ->get();
            } else {
                $opd = \App\Models\Opd::orderBy('alias_opd', 'asc')
                    ->get();
            }
            $arr = [];
            foreach ($opd as $val) {
                $arrx["nama_opd"] = $val->nama_opd;
                $arrx["alias_opd"] = $val->alias_opd;
                $arrx["total"] = $val->get_file->count();
                $arrx["upload"] = $val->get_file->count();
                $arrx["download"] = $val->get_file->pluck('total_download')->sum();
                $arrx["publikasi"] = \App\Models\OpdFile::where('status_file', 'publikasi')->where('opd_id', $val->id)->count();
                $arr[] = $arrx;
            }
        } else if (Auth::user()->role == 'Admin') {
            $arr = [
                'total_upload' => \App\Models\OpdFile::where('opd_id', Auth::user()->opd_parent)->where('created_by', Auth::user()->id)->count(),
                'total_download' => \App\Models\OpdFile::where('opd_id', Auth::user()->opd_parent)->pluck('total_download')->sum(),
                'total_verifikasi' => \App\Models\OpdFile::where('status_file', 'verifikasi')->where('opd_id', Auth::user()->opd_parent)
                    ->where('opd_id', Auth::user()->opd_parent)->count(),
                'total_publikasi' => \App\Models\OpdFile::where('status_file', 'publikasi')->where('opd_id', Auth::user()->opd_parent)
                    ->where('opd_id', Auth::user()->opd_parent)->count(),
            ];
        }
        return response()->json($arr);
    }

    public function show()
    {

    }
    public function store(Request $request)
    {
        if ($request["type"] == 'staff') {
            if ($request["id"]) {
                $data = \App\Models\Uptd::find($request["id"]);
            } else {
                $data = new \App\Models\Uptd;
            }
            $data->opd_id = $request["uptd_opd_id"];
            $data->nama_uptd = $request["nama"];
            $data->save();
        } else {
            if ($request["id_opd"]) {
                $obj = new \App\Models\Uptd();
                $obj->opd_id = $request["id_opd"];
                $obj->nama_uptd = $request["uptd"];
                $obj->save();
            } else {
                if ($request["id"]) {
                    $data = \App\Models\Opd::find($request["id"]);
                } else {
                    $data = new \App\Models\Opd;
                }
                $data->nama_opd = $request["nama"];
                $data->alias_opd = $request["alias_opd"];
                $data->save();
            }
        }
        return redirect(route('opd.index'));
    }

    public function get_uptd(Request $request)
    {
        $data = \App\Models\Uptd::where('opd_id', $request["id"])->get();
        return response()->json($data);
    }

    public function destroy(Request $request)
    {
        $opd = \App\Models\Opd::find($request["id"]);
        if ($opd) {
            $opd->delete();
            return response()->json(["delete" => 'success']);
        } else {
            return response()->json(["delete" => 'failed']);
        }
    }

    public function hapus_opd(Request $request)
    {
        $uptd = \App\Models\Uptd::find($request["id"]);
        if ($uptd) {
            $uptd->delete();
            return response()->json(["delete" => 'success']);
        } else {
            return response()->json(["delete" => 'failed']);
        }
    }

    public function datatable()
    {
        if (Auth::user()->role != 'super admin') {
            $data = \App\Models\Opd::where('id', Auth::user()->opd_parent)->get();
        } else if (Auth::user()->role == 'super admin' && Auth::user()->username == 'bidang.ppm') {
            $data = \App\Models\Opd::whereIn('id', [37, 38, 9, 12, 23, 22, 35, 33, 39, 36, 34, 10, 13, 16, 31, 19])->get();
        } else if (Auth::user()->role == 'super admin' && Auth::user()->username == 'bidang.psda') {
            $data = \App\Models\Opd::whereIn('id', [27, 28, 30, 29, 26, 24, 32])->get();
        } else if (Auth::user()->role == 'super admin' && Auth::user()->username == 'bidang.infrawil') {
            $data = \App\Models\Opd::whereIn('id', [18, 15, 14])
                ->orWhere('nama_opd', 'LIKE', '%Kecamatan%')
                ->get();
        } else {
            $data = \App\Models\Opd::all();
        }
        return Datatables::of($data)
            ->addColumn('nama_opd', function ($val) {
                if (!$val->get_file->isEmpty()) {
                    return '<a role="presentation" href=' . route('opd.file') . '?id=' . $val->id . '>' . $val->nama_opd . '</a>';
                } else {
                    return $val->nama_opd;
                }
            })
            ->addColumn('total_parent', function ($val) {
                return $val->get_uptd->count();
            })
            ->addColumn('status_file', function ($val) {
                if (!$val->get_file->isEmpty()) {
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
                if (Auth::user()->role == 'super admin') {
                    $tambah_opd = ' <a class="dropdown-item" role="presentation" href=' . route('opd.uptd') . '?id=' . $val->id . '>Tambah User OPD</a>';
                    $edit = '
                    <a class="dropdown-item" role="presentation" href=' . route('opd.form') . '?id=' . $val->id . '>Edit</a>';
                    $delete = '<a class="dropdown-item delete" role="presentation" href="javascript:void(0)" data-bind="{{ $val->id }}">Delete</a>';
                } else {
                    $edit = '';
                    $delete = '';
                }
                return '<div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Aksi
                                <i class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></i>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" role="presentation" href=' . route('opd.file') . '?id=' . $val->id . '>Kelola File</a>
                                ' . $edit . '
                                ' . $delete . '
                            </div>
                        </div>';
            })
            ->rawColumns(['aksi', 'status_file', 'nama_opd'])
            ->make(true);
    }

    public function datatable_opd_parent(Request $request)
    {
        $data = \App\Models\Uptd::where('opd_id', $request["id"])->get();
        return Datatables::of($data)
            ->addColumn('aksi', function ($val) {
                $edit = '<a class="dropdown-item" role="presentation" href=' . route('opd.form') . '?id=' . $val->id . '&type=staff>Edit</a>';
                return '<div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Aksi</button>
                            <div class="dropdown-menu" role="menu">
                                ' . $edit . '
                                <a class="dropdown-item delete-parent" role="presentation" href="javascript:void(0)" data-bind=' . $val->id . '>Delete</a>
                            </div>
                        </div>';
            })
            ->rawColumns(['aksi', 'status_file'])
            ->make(true);
    }
}
