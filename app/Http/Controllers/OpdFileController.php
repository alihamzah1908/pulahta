<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Zip;
use Auth;

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
        if($request["file_to_uptd"]){
            $file = $request->file('file');
            $realname = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $new_name = $realname . "-" . time() . "." . $extension;
            $file->move(public_path('uploads'), $new_name);
            foreach($request["file_to_uptd"] as $val){
                $data = new \App\Models\OpdFile;
                $data->judul = $request["judul"];
                $data->opd_id = $request["nama_opd"];
                $data->created_by = Auth::user()->id;
                $data->file = $new_name;
                $data->file_to_uptd = $val;
                $data->upload_file_by = $request["upload_file_by"];
                $data->save();
            }
        }else{
            $data = new \App\Models\OpdFile;
            $data->judul = $request["judul"];
            $data->opd_id = $request["nama_opd"];
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $realname = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $new_name = $realname . "-" . time() . "." . $extension;
                $file->move(public_path('uploads'), $new_name);
                $data->file = $new_name;
                $data->upload_file_by = $request["upload_file_by"];
            //    $data->file_to_uptd = implode(',', $request["file_to_uptd"]);
            //    $data->uptd_id = implode(',', $request["file_to_uptd"]);
            }
            $data->created_by = Auth::user()->id;
            $data->save();
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

    public function upload_file(Request $request){
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
        $data->created_by = Auth::user()->id;
        $data->upload_file_by = $request["upload_file_by"];
        $data->save();
        return redirect(route('dataset.detail', ['id' => $request["upload_file_by"]]));
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
            unlink(public_path() . '/uploads/' . $request["file"]);
            $opd->delete();
            return response()->json(["delete" => 'success']);
        } else {
            return response()->json(["delete" => 'failed']);
        }
    }

    public function get_download(Request $request)
    {
        $file = public_path() . "/uploads/". $request["file"];
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

    public function download_all(Request $request){
        $zip = Zip::create('file.zip');
        return $zip;
        // $files = \App\Models\OpdFile::where('opd_id', $request["id"])->get();
        // $arr = [];
        // foreach($files as $key => $val){
        //     $arrx[$key] = public_path('/uploads').$val->file;
        // }
        // return ZipFacade::create($request["id"] .'-data-'. $request["nama_opd"] .'.zip', $arr);
    }
}
