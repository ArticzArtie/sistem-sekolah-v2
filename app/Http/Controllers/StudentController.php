<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    // GET /students
    public function index()
    {
        return 'Menampilkan halaman daftar siswa';
    }

    // GET /students/create
    public function create()
    {
        return 'Menampilkan halaman tambah siswa';
    }

    // POST /students
    public function store(Request $request)
    {
        return 'Melakukan penambahan data siswa';
    }

    // GET /students/{id}
    public function show($id)
    {
        return "Menampilkan siswa dengan ID: {$id}";
    }

    // GET /students/{id}/edit
    public function edit($id)
    {
        return "Menampilkan halaman edit siswa dengan ID: {$id}";
    }

    // PUT/PATCH /students/{id}
    public function update(Request $request, $id)
    {
        return "Melakukan perubahan data siswa dengan ID: {$id}";
    }

    // DELETE /students/{id}
    public function destroy($id)
    {
        return "Menghapus data siswa dengan ID: {$id}";
    }
}