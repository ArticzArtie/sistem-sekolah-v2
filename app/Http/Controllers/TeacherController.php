<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // GET /teachers
    public function index()
    {
        return "Ini adalah halaman daftar guru";
    }

    // GET /teachers/create
    public function create()
    {
        return "Ini adalah halaman tambah guru";
    }

    // POST /teachers
    public function store(Request $request)
    {
        return "Menambah data guru baru";
    }

    // GET /teachers/{id}
    public function show(string $id)
    {
        return "Menampilkan detail guru dengan ID: {$id}";
    }

    // GET /teachers/{id}/edit
    public function edit(string $id)
    {
        return "Ini adalah halaman edit guru dengan ID: {$id}";
    }

    // PUT/PATCH /teachers/{id}
    public function update(Request $request, string $id)
    {
        return "Mengubah data guru dengan ID: {$id}";
    }

    // DELETE /teachers/{id}
    public function destroy(string $id)
    {
        return "Menghapus data guru dengan ID: {$id}";
    }
}