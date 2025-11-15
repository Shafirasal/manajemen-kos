<?php

namespace App\Http\Controllers;

use App\Models\PenyewaModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PenyewaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Data Penyewa',
            'list'  => ['Home', 'Penyewa']
        ];

        $page = (object) [
            'title' => 'Data Penyewa Kos'
        ];

        $activeMenu = 'penyewa';

        return view('penyewa.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function list(Request $request)
    {
        $data = PenyewaModel::select(
            'id_penyewa',
            'nama',
            'alamat',
            'no_hp',
            'jenis_kelamin'
        );

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $btn  = '<button onclick="modalAction(\'' . url('/penyewa/' . $row->id_penyewa . '/show') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/penyewa/' . $row->id_penyewa . '/edit') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/penyewa/' . $row->id_penyewa . '/confirm') . '\')" class="btn btn-danger btn-sm">Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    public function create()
    {
        return view('penyewa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string|max:50',
            'alamat'        => 'required|string|max:225',
            'no_hp'         => 'required|string|max:13',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
        ]);

        PenyewaModel::create($request->all());

        return response()->json([
            'status'  => true,
            'message' => 'Data penyewa berhasil disimpan.'
        ]);
    }

    public function show($id)
    {
        $penyewa = PenyewaModel::find($id);

        if (!$penyewa) {
            abort(404);
        }

        return view('penyewa.show', compact('penyewa'));
    }

    public function edit($id)
    {
        $penyewa = PenyewaModel::find($id);

        if (!$penyewa) {
            abort(404);
        }

        return view('penyewa.edit', compact('penyewa'));
    }

    public function update(Request $request, $id)
    {
        $penyewa = PenyewaModel::find($id);

        if (!$penyewa) {
            return response()->json([
                'status'  => false,
                'message' => 'Data tidak ditemukan.'
            ]);
        }

        $validated = $request->validate([
            'nama'          => 'required|string|max:50',
            'alamat'        => 'required|string|max:225',
            'no_hp'         => 'required|string|max:13',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
        ]);

        $penyewa->update($validated);

        return response()->json([
            'status'  => true,
            'message' => 'Data penyewa berhasil diperbarui.'
        ]);
    }

    public function confirm($id)
    {
        $penyewa = PenyewaModel::find($id);

        if (!$penyewa) {
            abort(404);
        }

        return view('penyewa.confirm', compact('penyewa'));
    }

    public function delete(Request $request, $id)
    {
        if ($request->ajax()) {
            $penyewa = PenyewaModel::find($id);

            if (!$penyewa) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Data tidak ditemukan.'
                ]);
            }

            $penyewa->delete();

            return response()->json([
                'status'  => true,
                'message' => 'Data berhasil dihapus.'
            ]);
        }

        return redirect()->route('penyewa.index');
    }
}
