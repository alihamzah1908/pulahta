<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use DataTables;


class CkanController extends Controller
{
    //
    public function index()
    {
        $data = \App\Models\CkanApi::all();
        return view('admin.api', $data);
    }

    public function sinkronisasi()
    {
        $files = \App\Models\OpdFile::where('status_file', 'publikasi')->get();
        $file_count = 0;
        // dd($files);
        
        foreach($files as $file)
        {
            $response = Http::get('http://data.ciamiskab.go.id/api/3/action/organization_list');
            $org_list = json_decode($response->body(), true);
            // dd($org_list);
            
            $nama_opd = $file->get_opd->nama_opd;
            $alias_opd = Str::lower($file->get_opd->alias_opd);

            foreach ($org_list['result'] as $org){
                // dd($org != $alias_opd);
                if ($org != $alias_opd){
                    $org_create = Http::withHeaders([
                        'Authorization' => config('ckanapi.private_key')
                    ])->post('http://data.ciamiskab.go.id/api/3/action/organization_create', [
                        "name" => Str::lower($alias_opd),
                        "title" => $nama_opd,
                        "description" => $nama_opd,
                    ]);
                    $resp = json_decode($org_create->body(), true);
                    if ($resp['success'] == true){
                        $resource_create = Http::attach(
                            'upload', fopen(public_path('uploads/' . $file->file), 'r'), $file->file
                        )->withHeaders([
                            'Authorization' => config('ckanapi.private_key')
                        ])->post('http://data.ciamiskab.go.id/api/3/action/resource_create', [
                            "package_id" => Str::kebab($file->judul),
                            "description" => $file->keterangan, // coba ganti dengan $file->keterangan
                            "name" => $file->judul,
                        ]);
                        // $resp = json_decode($resource_create->body(), true);
                        // dd(public_path('uploads/'. $file->file));
                        // dd($resp);
                    }
                    // dd($resp);
                } else {
                    // $dataset_search = Http::get('http://data.ciamiskab.go.id/api/3/action/package_search', [
                    //     "q" => Str::lower($file->judul)
                    // ]);
                    // $resp = json_decode($dataset_search->body(), true);
                    // dd($resp);

                    $dataset_create = Http::withHeaders([
                        'Authorization' => config('ckanapi.private_key')
                    ])->post('http://data.ciamiskab.go.id/api/3/action/package_create', [
                        "name" => Str::kebab($file->judul),
                        "title" => $file->judul,
                        "notes" => $file->keterangan, // coba ganti dengan $file->keterangan
                        "owner_org" => $org,
                    ]);
                    $resp = json_decode($dataset_create->body(), true);
                    // dd($resp);

                    if ($resp['success'] == true){
                        $resource_create = Http::attach(
                            'upload', fopen(public_path('uploads/' . $file->file), 'r'), $file->file
                        )->withHeaders([
                            'Authorization' => config('ckanapi.private_key')
                        ])->post('http://data.ciamiskab.go.id/api/3/action/resource_create', [
                            "package_id" => Str::kebab($file->judul),
                            // "url" =>  "https://raw.githubusercontent.com/frictionlessdata/test-data/master/files/csv/100kb.csv",
                            "description" => $file->keterangan,
                            "name" => $file->judul,
                        ]);
                        // $resp = json_decode($resource_create->body(), true);
                        // dd(public_path('uploads/'. $file->file));
                        // dd($resp);
                    }
                }
            }
            ++$file_count;
        }

        $log = new \App\Models\CkanApi;
        $log->jumlah_data = $file_count;
        $log->status = "sukses";
        $log->keterangan = "";
        $log->save();
        
        return redirect()->back()->with('success', 'Data berhasil disinkronisasi sebanyak ' . $file_count);
    }

    public function datatable()
    {
        $data = \App\Models\CkanApi::all();
        
        return Datatables::of($data)
            ->make(true);
    }
}
