<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    protected function majors(): array
    {
        return [
            ['id' => 1, 'code' => 'AKL', 'name' => 'Akuntansi dan Keuangan Lembaga', 'description' => 'Program keahlian yang membekali murid dengan kompetensi pencatatan dan pelaporan keuangan.'],
            ['id' => 2, 'code' => 'TKJ', 'name' => 'Teknik Komputer dan Jaringan', 'description' => 'Program keahlian yang membekali murid dengan kompetensi instalasi, konfigurasi, dan pemeliharaan jaringan komputer.'],
            ['id' => 3, 'code' => 'BD', 'name' => 'Bisnis Digital', 'description' => 'Program keahlian yang membekali murid dengan kompetensi pemasaran dan pengelolaan bisnis berbasis digital.'],
        ];
    }

    public function index()
    {
        return view('majors.index', [
            'title' => 'Sistem Sekolah - Daftar Jurusan',
            'majors' => $this->majors(),
        ]);
    }

    public function create()
    {
        return view('majors.create', [
            'title' => 'Sistem Sekolah - Tambah Jurusan',
        ]);
    }

    public function store(Request $request)
    {
        return 'Menambah data jurusan baru';
    }

    public function show(string $id)
    {
        return view('majors.show', [
            'title' => 'Sistem Sekolah - Detail Jurusan',
            'major' => collect($this->majors())->firstWhere('id', (int) $id),
        ]);
    }

    public function edit(string $id)
    {
        return view('majors.edit', [
            'title' => 'Sistem Sekolah - Edit Jurusan',
            'major' => collect($this->majors())->firstWhere('id', (int) $id),
        ]);
    }

    public function update(Request $request, string $id)
    {
        return "Mengubah data jurusan dengan ID: {$id}";
    }

    public function destroy(string $id)
    {
        return "Menghapus data jurusan dengan ID: {$id}";
    }
}