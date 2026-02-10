<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class StudentController extends Controller
{
    public function create()
    {
        return view('create_student');
    }

    public function store()
    {
        $session = session();

        $newStudent = [
            'name'  => $this->request->getPost('name'),
            'nim'   => $this->request->getPost('nim'),
            'major' => $this->request->getPost('major'),
        ];

        // get existing students from session
        $students = $session->get('students') ?? [];

        // add new student
        $students[] = $newStudent;

        // save back to session
        $session->set('students', $students);

        return redirect()->to('/list');
    }

    public function home()
    {
        $students = session()->get('students') ?? [];

        return view('list', ['students' => $students]);
    }
}
