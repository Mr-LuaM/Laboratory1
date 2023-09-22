<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class StudentController extends BaseController
{
    private $students;
    private $section;

    public function __construct()
    {
        $this->students = new \App\Models\StudentModel();
        $this->section = new \App\Models\SectionModel();
    }

    public function students()
    {
        $data = [
            'students' => $this->students->findAll(),
            'sections' => $this->section->findAll(),
            'genders' => ['Male', 'Female', 'Others'],

        ];

        return view('students', $data);
    }

    public function save()
    {

        $id = $_POST['id'];
        $data = [
            'StudID' => $this->request->getPost('StudID'),
            'StudName' => $this->request->getPost('StudName'),
            'StudGender' => $this->request->getPost('StudGender'),
            'StudCourse' => $this->request->getPost('StudCourse'),
            'StudSection' => $this->request->getPost('StudSection'),
            'StudYear' => $this->request->getPost('StudYear'),

        ];

        if ($id != null) {
            $this->students->set($data)->where('id', $id)->update();

        } else {
            $this->students->insert($data);
        }
        return redirect()->to('/students');

    }


    public function edit($student)
    {

        $data = [
            'records' => $this->students->where('id', $student)->first(),
            'students' => $this->students->findAll(),
            'sections' => $this->section->findAll(),
            'genders' => ['Male', 'Female', 'Others'],
        ];

        return view('students', $data);
    }

    public function delete($student)
    {

        $this->students->delete($student);

        return redirect()->to('/students');
    }


    //pag manage section
    public function createSection()
    {
        $data = [
            'Section' => $this->request->getPost('section'),
        ];

        $this->section->insert($data);

        return redirect()->to('/students');
    }

    public function deleteSection($section)
    {

        $this->section->delete($section);
        return redirect()->to('/students');
    }

    public function index()
    {
        //
    }
}