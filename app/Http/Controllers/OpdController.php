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

    public function get_perangkat()
    {
        $opd = \App\Models\Opd::orderBy('alias_opd', 'asc')->get();
        $arr = [];
        foreach ($opd as $val) {
            $arrx["nama_opd"] = $val->nama_opd;
            $arrx["alias_opd"] = $val->alias_opd;
            $arrx["total"] = $val->get_file->count();
            $arrx["upload"] = $val->get_file->count();
            $arrx["download"] = $val->get_file->pluck('total_download')->sum();
            $arr[] = $arrx;
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
                    return '<span class="badge badge-danger">Tidak Tersedia</span>';
                }
            })
            ->addColumn('dibuat_pada', function ($val) {
                return date('d M Y', strtotime($val->created_at));
            })
            ->addColumn('aksi', function ($val) {
                if (Auth::user()->role == 'super admin') {
                    $edit = '
                    <a class="dropdown-item" role="presentation" href=' . route('opd.form') . '?id=' . $val->id . '>Edit</a>';
                    $delete = '<a class="dropdown-item delete" role="presentation" href="javascript:void(0)" data-bind="{{ $val->id }}">Delete</a>';
                } else {
                    $edit = '';
                    $delete = '';
                }
                return '<div class="dropdown d-flex justify-content-end">
                            <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Aksi</button>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" role="presentation" href=' . route('opd.uptd') . '?id=' . $val->id . '>Tambah User OPD</a>
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
                                <a class="dropdown-item" role="presentation" href=' . route('opdfile.form') . '?id=' . $val->opd_id . '&type=staff&uptd_id=' . $val->id . '>Kelola File</a>
                                ' . $edit . '
                                <a class="dropdown-item delete-parent" role="presentation" href="javascript:void(0)" data-bind=' . $val->id . '>Delete</a>
                            </div>
                        </div>';
            })
            ->rawColumns(['aksi', 'status_file'])
            ->make(true);
    }
}
