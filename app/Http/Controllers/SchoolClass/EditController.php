<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Request $request, string $id)
    {
        $classes = [
            ['id' => 1, 'name' => 'XII AKL 1', 'grade' => 'XII', 'major' => 'AKL', 'major_id' => 1, 'homeroom_teacher' => 'Budi Santoso', 'teacher_id' => 1],
            ['id' => 2, 'name' => 'XII TKJ 1', 'grade' => 'XII', 'major' => 'TKJ', 'major_id' => 2, 'homeroom_teacher' => 'Siti Aminah', 'teacher_id' => 2],
        ];

        $majors = [
            ['id' => 1, 'code' => 'AKL', 'name' => 'Akuntansi dan Keuangan Lembaga'],
            ['id' => 2, 'code' => 'TKJ', 'name' => 'Teknik Komputer dan Jaringan'],
            ['id' => 3, 'code' => 'BiD', 'name' => 'Bisnis Digital'],
        ];

        $teachers = [
            ['id' => 1, 'name' => 'Budi'],
            ['id' => 2, 'name' => 'Siti'],
        ];

        return view('classes.edit', [
            'title' => 'Sistem Sekolah - Edit Kelas',
            'class' => collect($classes)->firstWhere('id', (int) $id),
            'majors' => $majors,
            'teachers' => $teachers,
        ]);
    }
}