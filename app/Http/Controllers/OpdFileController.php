<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Zip;
use ZipArchive;

class OpdFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request["file_to_uptd"]) {
            $file = $request->file('file');
            $realname = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $new_name = $request["judul"] . "-" . now()->format('Y-m-d-H-i-s') . "." . $extension;
            $file->move(public_path('uploads'), $new_name);
            foreach ($request["file_to_uptd"] as $val) {
                $data = new \App\Models\OpdFile;
                $data->judul = $request["judul"];
                $data->opd_id = $request["nama_opd"];
                $data->created_by = Auth::user()->id;
                $data->file = $new_name;
                $data->file_to_uptd = $val;
                $data->upload_file_by = $request["upload_file_by"];
                $data->uptd_id = $val;
                $data->status_file = 'asli';
                $data->keterangan = $request["keterangan"];
                $data->keterangan_table = $request["keterangan_table"];
                $data->jenis_file = $request["jenis_file"];
                $data->save();

                // Notifikasi
                $notifikasi = new \App\Models\Notifikasi();
                $notifikasi->opd_id = $request["nama_opd"];
                $notifikasi->opd_file_id = $data->id;
                $notifikasi->is_read = 0;
                $notifikasi->created_by = Auth::user()->id;
                $notifikasi->save();
            }
        } else {
            $data = new \App\Models\OpdFile;
            $data->judul = $request["judul"];
            $data->opd_id = $request["nama_opd"];
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $realname = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $new_name = $request["judul"] . "-" . now()->format('Y-m-d-H-i-s') . "." . $extension;
                $file->move(public_path('uploads'), $new_name);
                $data->file = $new_name;
                $data->upload_file_by = $request["upload_file_by"];
                //    $data->file_to_uptd = implode(',', $request["file_to_uptd"]);
                //    $data->uptd_id = implode(',', $request["file_to_uptd"]);
            }
            $data->status_file = 'asli';
            $data->keterangan = $request["keterangan"];
            $data->keterangan_table = $request["keterangan_table"];
            $data->jenis_file = $request["jenis_file"];
            $data->created_by = Auth::user()->id;
            $data->save();
            // dd($data->id);
            // Notifikasi
            $notifikasi = new \App\Models\Notifikasi();
            $notifikasi->opd_id = $request["nama_opd"];
            $notifikasi->opd_file_id = $data->id;
            $notifikasi->is_read = 0;
            $notifikasi->created_by = Auth::user()->id;
            $notifikasi->save();
        }

        // Tambah data file access
        // if($request["file_to_uptd"]){
        //     foreach($request["file_to_uptd"] as $val){
        //         $obj = new \App\Models\FileAccess();
        //         $obj->uptd_id = $val;
        //         $obj->file_id = $data->id;
        //         $obj->created_by = Auth::user()->id;
        //         $obj->save();
        //     }
        // }
        return redirect(route('opd.file', ['id' => $request["nama_opd"]]));
    }

    public function upload_file(Request $request)
    {
        $data = new \App\Models\OpdFile;
        $data->judul = $request["judul"];
        $data->opd_id = $request["opd_id"];
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $realname = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $new_name = $request["judul"] . "-" . now()->format('Y-m-d-H-i-s') . "." . $extension;
            $file->move(public_path('uploads'), $new_name);
            $data->file = $new_name;
            $data->file_to_uptd = $request["file_to_uptd"];
        }
        $data->status_file = 'asli';
        $data->keterangan = $request["keterangan"];
        $data->keterangan_table = $request["keterangan_table"];
        $data->created_by = Auth::user()->id;
        $data->upload_file_by = $request["upload_file_by"];
        $data->save();
        return redirect(route('dataset.detail', ['id' => $request["upload_file_by"]]));
    }

    public function upload_metadata(Request $request)
    {
        if ($request["id_metadata"]) {
            foreach ($request["id_metadata"] as $key => $value) {
                // $collection = collect($request["id_metadata"]);
                // if ($collection->contains($request["id_metadata"])) {
                $obj = \App\Models\KamusData::find($value);
                $obj->opd_file_id = $request["file_id"];
                $obj->tipe = $request["tipe"][$key];
                $obj->label = $request["label"][$key];
                $obj->kegunaan = $request["keterangan"][$key];
                $obj->save();
                // } else {
                //     $obj = new \App\Models\KamusData();
                //     $obj->opd_file_id = $request["file_id"];
                //     $obj->tipe = $request["tipe"][$key];
                //     $obj->label = $request["label"][$key];
                //     $obj->kegunaan = $request["keterangan"][$key];
                //     $obj->save();
                // }
            }
        } else {
            foreach ($request["tipe"] as $key => $val) {
                $obj = new \App\Models\KamusData();
                $obj->opd_file_id = $request["file_id"];
                $obj->tipe = $val;
                $obj->label = $request["label"][$key];
                $obj->kegunaan = $request["keterangan"][$key];
                $obj->save();
            }
        }
        return redirect(route('file.metadata', ['id' => $request["file_id"]]));
    }

    public function update_status(Request $request)
    {
        $obj = \App\Models\OpdFile::find($request["id"]);
        $obj->status_file = $request["status"];
        $obj->save();
        return response()->json(["success" => 'true']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function file_delete(Request $request)
    {
        $opd = \App\Models\OpdFile::find($request["id"]);
        if ($opd) {
            $path = public_path() . '/uploads/' . $request["file"];
            $file_exists = File::exists($path);
            if ($file_exists == false) {
                return response()->json(["delete" => 'failed']);
            } else {unlink(public_path() . '/uploads/' . $request["file"]);
                $opd->delete();
                return response()->json(["delete" => 'failed']);
            }
        } else {
            return response()->json(["delete" => 'failed']);
        }
    }

    public function get_download(Request $request)
    {
        $file = public_path() . "/uploads/" . $request["file"];
        $headers = array(
            'Content-Type: application/xlsx',
            'Content-Type: application/xls',
            'Content-Type: application/pdf',
        );
        $data = \App\Models\OpdFile::find($request["id"]);
        $obj = \App\Models\OpdFile::find($request["id"]);
        $obj->total_download = $data->total_download + 1;
        $obj->save();
        return Response::download($file, $request["file"], $headers);
    }

    public function download_all(Request $request)
    {
        $zip = new ZipArchive;
        $fileName = 'pullahta_file.zip';
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path('uploads'));
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
            $zip->close();
        }
        return response()->download(public_path($fileName));
        // $zip = new ZipArchive;
        // $fileName = 'myNewFile.zip';
        // if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE){
        //     $files = \App\Models\OpdFile::where('opd_id', $request["id"])->get();
        //     $arr = [];
        //     foreach($files as $key => $val){
        //         $arrx[$key] = public_path('/uploads').$val->file;
        //     }
        //     return response()->download(public_path($fileName));
        // }
        
    }

    public function notifikasi(Request $request)
    {
        if (Auth::user()->role == 'Admin') {
            $notif = DB::table('notifikasi as a')
                ->select('a.id as id_notifikasi', 'a.opd_id', 'b.*', 'c.*', 'd.jenis_file')
                ->join('users as b', 'a.created_by', 'b.id')
                ->join('opd as c', 'a.opd_id', 'c.id')
                ->join('opd_file as d', 'a.opd_file_id', 'd.id')
                ->where('a.is_read', '0')
                ->where('a.created_by', '!=', Auth::user()->id)
                ->where('a.opd_id', Auth::user()->opd_parent)
                ->orderBy('a.id', 'desc')
                ->get();
        } elseif (Auth::user()->role == 'super admin' && Auth::user()->username == 'datainformasi') {
            $notif = DB::table('notifikasi as a')
                ->select('a.id as id_notifikasi', 'a.opd_id', 'b.*', 'c.*', 'd.jenis_file')
                ->join('users as b', 'a.created_by', 'b.id')
                ->join('opd as c', 'a.opd_id', 'c.id')
                ->join('opd_file as d', 'a.opd_file_id', 'd.id')
                ->where('a.is_read', '0')
                ->where('a.created_by', '!=', Auth::user()->id)
                ->whereIn('d.jenis_file', ['lkpj', 'rkpd'])
                ->orderBy('a.id', 'desc')
                ->get();
        } elseif (Auth::user()->role == 'super admin' && Auth::user()->username == 'bidang.ppm') {
            $notif = DB::table('notifikasi as a')
                ->select('a.id as id_notifikasi', 'a.opd_id', 'b.*', 'c.*', 'd.jenis_file')
                ->join('users as b', 'a.created_by', 'b.id')
                ->join('opd as c', 'a.opd_id', 'c.id')
                ->join('opd_file as d', 'a.opd_file_id', 'd.id')
                ->where('a.is_read', '0')
                ->where('a.created_by', '!=', Auth::user()->id)
                ->whereIn('d.jenis_file', ['lkpj', 'rkpd'])
                ->whereIn('c.id', [37, 12, 22, 35, 33, 39, 34, 10, 16, 31, 19])
                ->orderBy('a.id', 'desc')
                ->get();
        } elseif (Auth::user()->role == 'super admin' && Auth::user()->username == 'bidang.psda') {
            $notif = DB::table('notifikasi as a')
                ->select('a.id as id_notifikasi', 'a.opd_id', 'b.*', 'c.*', 'd.jenis_file')
                ->join('users as b', 'a.created_by', 'b.id')
                ->join('opd as c', 'a.opd_id', 'c.id')
                ->join('opd_file as d', 'a.opd_file_id', 'd.id')
                ->where('a.is_read', '0')
                ->where('a.created_by', '!=', Auth::user()->id)
                ->whereIn('d.jenis_file', ['lkpj', 'rkpd'])
                ->whereIn('c.id', [27, 28, 30, 29, 26, 24, 32])
                ->orderBy('a.id', 'desc')
                ->get();
        } elseif (Auth::user()->role == 'super admin' && Auth::user()->username == 'bidang.infrawil') {
            $notif = DB::table('notifikasi as a')
                ->select('a.id as id_notifikasi', 'a.opd_id', 'b.*', 'c.*', 'd.jenis_file')
                ->join('users as b', 'a.created_by', 'b.id')
                ->join('opd as c', 'a.opd_id', 'c.id')
                ->join('opd_file as d', 'a.opd_file_id', 'd.id')
                ->where('a.is_read', '0')
                ->where('a.created_by', '!=', Auth::user()->id)
                ->whereIn('d.jenis_file', ['lkpj', 'rkpd'])
                ->whereIn('c.id', [18, 15, 14])
                ->orWhere('nama_opd', 'LIKE', '%Kecamatan%')
                ->orderBy('a.id', 'desc')
                ->get();
        } elseif (Auth::user()->role == 'super admin' && Auth::user()->username == 'bidang.litbang') {
            $notif = DB::table('notifikasi as a')
                ->select('a.id as id_notifikasi', 'a.opd_id', 'b.*', 'c.*', 'd.jenis_file')
                ->join('users as b', 'a.created_by', 'b.id')
                ->join('opd as c', 'a.opd_id', 'c.id')
                ->join('opd_file as d', 'a.opd_file_id', 'd.id')
                ->where('a.is_read', '0')
                ->where('a.created_by', '!=', Auth::user()->id)
                ->whereIn('d.jenis_file', ['lkpj', 'rkpd'])
                ->whereIn('c.id', [36, 9, 13, 20, 23, 38])
                ->orderBy('a.id', 'desc')
                ->get();
        } elseif (Auth::user()->role == 'super admin') {
            $notif = DB::table('notifikasi as a')
                ->select('a.id as id_notifikasi', 'a.opd_id', 'b.*', 'c.*', 'd.jenis_file')
                ->join('users as b', 'a.created_by', 'b.id')
                ->join('opd as c', 'a.opd_id', 'c.id')
                ->join('opd_file as d', 'a.opd_file_id', 'd.id')
                ->where('a.is_read', '0')
                ->where('a.created_by', '!=', Auth::user()->id)
                ->orderBy('a.id', 'desc')
                ->get();
        }
        return response()->json($notif);
    }
}
