<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class CkanController extends Controller
{
    //
    public function index()
    {
        return view('admin.api');
    }

    public function sinkronisasi()
    {
        $files = \App\Models\OpdFile::all();
        $file_count = 0;
        // dd($files);
        
        foreach($files as $file)
        {
            // $endpoint = "http://data.ciamiskab.go.id/api/3/action/organization_list";
            // $client = new \GuzzleHttp\Client();
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
                            // "url" =>  "https://raw.githubusercontent.com/frictionlessdata/test-data/master/files/csv/100kb.csv",
                           
                           
                            "description" => "$file->judul" , // coba ganti dengan $file->keterangan
                            "name" => "$file->judul",
                            // "upload" => fopen(public_path('uploads/' . $file->file), 'r')
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
                        "description" => "description", // coba ganti dengan $file->keterangan
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
                            "description" => "$file->judul" ,
                            "name" => "$file->judul",
                            // "upload" => fopen(public_path('uploads/' . $file->file), 'r')
                        ]);
                        // $resp = json_decode($resource_create->body(), true);
                        // dd(public_path('uploads/'. $file->file));
                        // dd($resp);
                    }
                }
            }
            ++$file_count;
        }
        
        return redirect()->back()->with('success', 'Data berhasil disinkronisasi sebanyak ' . $file_count);
    }
}
