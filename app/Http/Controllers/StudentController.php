<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // GET /students
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Siswa';

        $students = Student::select(['id','nis','name','class','major'])
        ->get();

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
    public function store(StoreRequest $request)
    {
       //Validasi
       $validatedRequest=$request->validated();

              //Tambahkan ke database
        Student::create($validatedRequest);
            
       //Handle If Success
        return redirect()->route('students.index');
    }

    // GET /students/{id}
    public function show(Student $student)
    {
    
    $title = 'Sistem Sekolah - Detail Siswa';
    

    return view('student.show', [
        'title' => $title,
        'students'=>$student,

    ]);
}

    // GET /students/{id}/edit
    public function edit(student $student)
{
        $title = 'Edit Siswa';
            return view('students.edit',[
                'title'=> $title,
        'student' => $student
    ]);
}

    // PUT/PATCH /students/{id}
    public function update(Student $student, UpdateRequest $request)
    {
       //Validasi
       $validatedRequest=$request->validated();
       //Update Date
       $student->update($validatedRequest);

       //Handele if Success
        return redirect()->route('student.index');
    }

    // DELETE /students/{id}
    public function destroy(student $student)
    {
        //Delete
        $student->delete();

        //Handle if Success
        return redirect()->route('student.index');
    }
}