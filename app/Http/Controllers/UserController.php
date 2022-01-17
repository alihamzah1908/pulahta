<?php

namespace App\Http\Controllers;

use Auth;
use DataTables;
use Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["user"] = \App\Models\User::all();
        return view('user.index', $data);
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
        if ($request["id"]) {
            $user = \App\Models\User::findOrFail($request["id"]);
        } else {
            $user = new \App\Models\User();
            $nama = $request["name"];
            //$email = $request["email"];
            //Mail::to($email)->send(new SendMail($nama));
            $user->password = Hash::make($request["password"]);
        }
        $user->name = $request["name"];
        $user->username = $request["username"];
        $user->email = $request["email"];
        $user->role = $request["role"];
        $user->parent_admin = $request["id_child"];
        $user->opd_parent = $request["opd_parent"];
        $user->uptd_parent = $request["uptd_parent"];
        $user->save();
        return redirect(route('user.index'));
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

    public function proses_ubah_password(Request $request)
    {
        // dd($request["password_lama"]);
        if (!(Hash::check($request["password_lama"], Auth::user()->password))) {
            return redirect()->back()->with("error", "Password anda tidak sama dengan password sebelumnya. Mohon dicoba kembali.");
        }
        if (strcmp($request["password_lama"], $request["password_baru"]) == 0) {
            return redirect()->back()->with("error", "Password baru anda tidak boleh sama dengan dengan password lama. Mohon dicoba kembali.");
        }
        if (!strcmp($request["password_baru"], $request["konfirmasi_password"]) == 0) {
            return redirect()->back()->with("error", "Password baru harus sama dengan password konformasi anda. Mohon tulis kembali.");
        }
        $user = Auth::user();
        $user->password = Hash::make($request["password_baru"]);
        $user->save();

        return redirect()->back()->with("success", "Ubah Password Berhasil !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = \App\Models\User::where('id', $request["id"])->first();
        if ($user) {
            // $user_parent = \App\Models\User::where('parent_admin', $request["id"])->first();
            $user->delete();
            // $user_parent->delete();
            return response()->json(["user" => 'success', "user_parent" => 'success']);
        } else {
            return redirect(route('user.index'));
        }
    }

    public function delete_parent(Request $request)
    {
        $user = \App\Models\User::where('id', $request["id"])->first();
        if ($user) {
            $user_parent = \App\Models\User::where('id', $request["id"])->first();
            $user_parent->delete();
            return response()->json(["user_parent" => 'success']);
        } else {
            return redirect(route('user.index'));
        }
    }

    public function datatable()
    {
        {
            if (Auth::user()->role == 'super admin') {
                $data = \App\Models\User::where('role', '!=', 'super admin')
                    ->where('parent_admin', '=', null)
                    ->get();
            } else {
                $data = \App\Models\User::where('role', '!=', 'super admin')
                    ->where('id', Auth::user()->id)
                    ->get();
            }
            return Datatables::of($data)
                ->addColumn('total_parent', function ($val) {
                    return \App\Models\User::where('parent_admin', $val->id)->count();
                })
                ->addColumn('aksi', function ($val) {
                    // <a class="dropdown-item add-staff" data-bind=\'' . $val->id . '\' role="presentation" href="javascript:void(0)" data-toggle="modal">Tambah Staff</a>
                    return '<div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Aksi 
                                        <i class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item edit" data-bind=\'' . $val . '\' role="presentation" href="javascript:void(0)" data-toggle="modal">Edit</a>
                                        <a class="dropdown-item delete" data-bind="' . $val->id . '" role="presentation" href="javascript:void(0)">Hapus</a>
                                    </div>
                                </div>';
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
    }

    public function parent_datatable(Request $request)
    {
        $data = \App\Models\User::where('role', '!=', 'super admin')
            ->where('parent_admin', $request["id"])
            ->get();
        return Datatables::of($data)
            ->addColumn('aksi', function ($val) {
                return '<div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Aksi</button>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item edit" data-bind=\'' . $val . '\' role="presentation" href="javascript:void(0)" data-toggle="modal">Edit</a>
                                    <a class="dropdown-item delete-parent" data-bind="' . $val->id . '" role="presentation" href="javascript:void(0)">Hapus</a>
                                </div>
                            </div>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function get_penduduk(Request $request)
    {
        $token = config('ckanapi.secret_key');
        $response = Http::get('http://localhost:8000/api/get_all_penduduk', [
            'secret_key' => $token,
        ]);
        $data = json_decode($response->body());
        return response()->json($data);
    }
}
