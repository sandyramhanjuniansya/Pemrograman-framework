<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PenghargaanRequest;
use App\Models\AlumniModel;
use App\Models\PenghargaanModel;
use Illuminate\Http\Request;

class PenghargaanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Penghargaan',
            'profile' => $this->profile,

            'alumni' => AlumniModel::all(),
            'penghargaan' => PenghargaanModel::getJoinPenghargaanAlumni()
        ];
        return view('dashboard/siswaterbaik', $data);
    }
    public function tambah(PenghargaanRequest $request)
    {
        // Validasi inputan sudah dilakukan pada parameter request

        // Save ke database
        PenghargaanModel::create([
            'nis' => $request->nis,
            'penghargaan' => $request->penghargaan
        ]);
        return redirect('dashboard/siswaterbaik')->with('pesan', 'Penghargaan berhasil ditambahkan');
    }
    public function edit($id)
    {
        $data = [
            'title'         => 'Edit Penghargaan',
            'profile'       => $this->profile,

            'alumni'        => AlumniModel::all(),
            'penghargaan'   => PenghargaanModel::find($id)
        ];

        return view('dashboard/siswaterbaik-edit', $data);
    }
    public function update(PenghargaanRequest $request, $id)
    {
        // Validasi inputan sudah dilakukan pada parameter request

        // Save ke database
        PenghargaanModel::where('id', $id)->update([
            'penghargaan' => $request->penghargaan
        ]);

        return redirect('dashboard/siswaterbaik')->with('pesan', 'Penghargaan berhasil diupdate');
    }
    public function delete($id)
    {
        if (PenghargaanModel::destroy($id)) {
            return redirect()->to('/dashboard/alumni')->with('pesan', 'Data berhasil dihapus');
        } else {
            return redirect()->to('/dashboard/alumni')->with('peringatan', 'Data gagal dihapus');
        }
    }
}
