<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProjectModel;
use Carbon\Carbon;

class Project extends BaseController
{
    public function index()
    {
        $now = Carbon::now();

        $model = new ProjectModel();

        $data['projects'] = $model->findAll();

        echo view('project/index', $data);
    }

    public function create()
    {
        echo view('project/create');
    }

    public function save()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules(
            [
                'title' => 'required',
                'date_start' => "required",
                'date_end' => "required",
                'desc' => 'required'
            ]
        );
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $news = new ProjectModel();
            $dataBerkas = $this->request->getFile('photo');
            $fileName = $dataBerkas->getRandomName();

            $news->insert([
                "title" => $this->request->getPost('title'),
                "link" => $this->request->getPost('link'),
                "date_start" => $this->request->getPost('date_start'),
                "date_end" => $this->request->getPost('date_end'),
                "description" => $this->request->getPost('desc'),
                "photo" => $fileName
            ]);

            $dataBerkas->move('uploads/photo-project/', $fileName);

            return redirect('project');
        }

        echo view('project/create');
    }

    public function delete($id)
    {
        $model = new ProjectModel();

        try {
            $model->where('id', $id)->delete();
            return redirect('project');
        } catch (\Throwable $th) {
            return redirect('project');
        }
    }
}
