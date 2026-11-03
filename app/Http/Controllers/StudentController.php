<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // GET /students
    public function index(Request $request)
    {
        $title = 'Sistem Sekolah - Daftar Siswa';
        $search = $request->query('search');
        $class = $request->query('class');
        $major = $request->query('major');

        $students = Student::select(['id','nis','name','class','major'])

        ->when($search, function($query, $search){
            $query->where(function ($query) use ($search) {
                $query->where('name','like',"%{$search}%")
            ->orWhere('nis','like',"%{$search}");
            });
            
            

        })
        ->when($class, fn($query,$class)=> $query->where('class','=',$class))
        ->when($major, fn($query,$major)=> $query->where('class','=',$major))
        ->paginate(10)
        ->withQueryString();

        $schoolClasses = ['10 AKL','11 AKL','11 TKJ 1','11 TKJ 2','10 BiD','12 TKJ 1','12 TKJ 2','12 TKJ 3'];
        $majors = ['AKL','BiD','TKJ'];

        return view('students.index', [
            'title' => $title,
            'students' => $students,
            'schoolClasses' => $schoolClasses,
            'majors' => $majors

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
    

    return view('students.show', [
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
        return redirect()->route('students.index');
    }

    // DELETE /students/{id}
    public function destroy(student $student)
    {
        //Delete
        $student->delete();

        //Handle if Success
        return redirect()->route('students.index');
    }
}