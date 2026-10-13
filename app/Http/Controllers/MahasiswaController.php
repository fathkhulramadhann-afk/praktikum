<?php

namespace App\Http\Controllers;

class MahasiswaController extends Controller
{
    private function dataMahasiswa(): array
    {
        return [
            ['nama' => 'Adit',   'nim' => '2301001', 'ipk' => 3.80],
            ['nama' => 'Budi',  'nim' => '2301002', 'ipk' => 3.20],
            ['nama' => 'Betryan', 'nim' => '2301003', 'ipk' => 2.75],
            ['nama' => 'Ucup',  'nim' => '2301004', 'ipk' => 1.90],
            ['nama' => 'Eka',   'nim' => '2301005', 'ipk' => 3.55],
        ];
    }

    public function profil()
    {
        $nama  = 'Fathkhul Ramadhan';
        $nim   = '242520084';
        $prodi = 'Teknologi Informasi';

        return view('mahasiswa.profil', compact('nama', 'nim', 'prodi'));
    }

    public function daftar()
    {
        $mahasiswa = $this->dataMahasiswa();
        $adaIpkRendah = collect($mahasiswa)->contains(fn ($m) => $m['ipk'] < 2.0);

        return view('mahasiswa.daftar', compact('mahasiswa', 'adaIpkRendah'));
    }

    public function detail($nim)
    {
        $mhs = collect($this->dataMahasiswa())->firstWhere('nim', $nim);

        if (!$mhs) {
            abort(404);
        }

        return view('mahasiswa.detail', ['mhs' => $mhs]);
    }
}