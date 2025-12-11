<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\PenyewaModel;
use App\Models\PengelolaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Data User',
            'list'  => ['Home', 'User']
        ];

        $page = (object)[
            'title' => 'Data user pada sistem kos'
        ];

        return view('user.index', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'roles'      => ['pemilik','operator','penyewa']
        ]);
    }

    public function list(Request $request)
    {
        $query = UserModel::with(['penyewa','pengelola']);

        if ($request->role) $query->where('role', $request->role);

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('nama', function($row){
                if ($row->role == 'penyewa')     return $row->penyewa->nama ?? '-';
                if ($row->role == 'pemilik')     return $row->pengelola->nama_pengelola ?? '-';
                if ($row->role == 'operator')    return $row->pengelola->nama_pengelola ?? '-';
                return '-';
            })
            ->addColumn('aksi', function($row){
                return '
                    <button onclick="modalAction(`'.url('/user/'.$row->id_user.'/show').'`)" class="btn btn-info btn-sm">Detail</button>
                    <button onclick="modalAction(`'.url('/user/'.$row->id_user.'/edit').'`)" class="btn btn-warning btn-sm">Edit</button>
                    <button onclick="modalAction(`'.url('/user/'.$row->id_user.'/confirm').'`)" class="btn btn-danger btn-sm">Hapus</button>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        return view('user.create', [
            'penyewa'   => PenyewaModel::all(),
            'pengelola' => PengelolaModel::all(),
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'role'         => 'required|in:pemilik,operator,penyewa',
            'username'     => 'required|unique:t_user,username|min:1|max:40',
            'password'     => 'required|min:5',
            'id_pengelola' => 'nullable|exists:t_pengelola,id_pemilik',
            'id_penyewa'   => 'nullable|exists:t_penyewa,id_penyewa',
        ];

        $val = Validator::make($request->all(), $rules);

        if ($val->fails()) {
            return response()->json([
                'status' => false,
                'msgField' => $val->errors()
            ]);
        }

        UserModel::create([
            'username'     => $request->username,
            'password'     => Hash::make($request->password),
            'role'         => $request->role,
            'id_pengelola' => in_array($request->role, ['pemilik','operator']) ? $request->id_pengelola : null,
            'id_penyewa'   => $request->role == 'penyewa' ? $request->id_penyewa : null,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User berhasil ditambahkan!'
        ]);
    }

    // ==============================
    // SHOW
    // ==============================
    public function show($id)
    {
        $user = UserModel::with(['penyewa','pengelola'])->find($id);

        return view('user.show', compact('user'));
    }


    public function edit($id)
    {
        $user = UserModel::find($id);

        return view('user.edit', [
            'user'      => $user,
            'penyewa'   => PenyewaModel::all(),
            'pengelola' => PengelolaModel::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'role'         => 'required|in:pemilik,operator,penyewa',
            'username'     => 'required|unique:t_user,username,'.$id.',id_user',
            'id_pengelola' => 'nullable|exists:t_pengelola,id_pemilik',
            'id_penyewa'   => 'nullable|exists:t_penyewa,id_penyewa',
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'min:5';
        }

        $val = Validator::make($request->all(), $rules);

        if ($val->fails()) {
            return response()->json([
                'status' => false,
                'msgField' => $val->errors()
            ]);
        }

        $user = UserModel::find($id);

        $user->username     = $request->username;
        $user->role         = $request->role;
        $user->id_pengelola = in_array($request->role, ['pemilik','operator']) ? $request->id_pengelola : null;
        $user->id_penyewa   = $request->role == 'penyewa' ? $request->id_penyewa : null;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'User berhasil diperbarui!'
        ]);
    }


    public function confirm($id)
    {
        return view('user.confirm', [
            'user' => UserModel::find($id)
        ]);
    }


    public function delete($id)
    {
        $user = UserModel::find($id);

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan!'
            ]);
        }

        $user->delete();

        return response()->json([
            'status' => true,
            'message' => 'User berhasil dihapus!'
        ]);
    }
}
