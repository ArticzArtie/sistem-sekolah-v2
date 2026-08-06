<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    // GET /students
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Siswa';
        $students = [
            [
                 'id' => 1,
                'nis' => '1001',
                'name' => 'Andi',
                'class' => 'XII TKJ 2',
                'major' => 'TKJ',
            ],
            [
                'id' => 2,
                'nis' => '1002',
                'name' => 'Budi',
                'class' => 'XII AKL 2',
                'major' => 'AKL',
            ],
               
            
        ];


        return view('students.index', [
            'title' => $title,
            'students' => $students,

        ]);
    }

    // GET /students/create
   public function create()
{
    return view('students.create', [
        'title' => 'Tambah Siswa',
    ]);
}

    // POST /students
    public function store(Request $request)
    {
        return 'Melakukan penambahan data siswa';
    }

    // GET /students/{id}
    public function show($id)
{
    $title = 'Detail Siswa';

    return view('students.show', [
        'title' => $title,
    ]);
}

    // GET /students/{id}/edit
    public function edit($id)
{
    return view('students.edit', [
        'title' => 'Edit Siswa',
    ]);
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