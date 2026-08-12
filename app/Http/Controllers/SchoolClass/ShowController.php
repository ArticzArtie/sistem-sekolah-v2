<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Request $request, string $id)
    {
        $classes = [
            ['id' => 1, 'name' => 'XII AKL 1', 'grade' => 'XII', 'major' => 'AKL', 'homeroom_teacher' => 'Budi Santoso'],
            ['id' => 2, 'name' => 'XII TKJ 1', 'grade' => 'XII', 'major' => 'TKJ', 'homeroom_teacher' => 'Siti Aminah'],
        ];

        return view('classes.show', [
            'title' => 'Sistem Sekolah - Detail Kelas',
            'class' => collect($classes)->firstWhere('id', (int) $id),
        ]);
    }
}