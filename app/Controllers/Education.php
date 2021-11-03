<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EducationModel;

class Education extends BaseController
{
    public function index()
    {
        $model = new EducationModel();
        $data['educations'] = $model->findAll();

        echo view('education/index', $data);
    }

    public function create()
    {
        echo view('education/create');
    }

    public function save()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules(
            [
                'title' => 'required',
                'final_score' => 'required',
                'date_start' => "required",
                'date_end' => "required",
            ]
        );

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $news = new EducationModel();

            $news->insert([
                "title" => $this->request->getPost('title'),
                "major" => $this->request->getPost('major'),
                "final_score" => $this->request->getPost('final_score'),
                "date_start" => $this->request->getPost('date_start'),
                "date_end" => $this->request->getPost('date_end'),
                "description" => $this->request->getPost('desc')
            ]);

            return redirect('education');
        }
    }

    public function edit($id)
    {
        $model = new EducationModel();

        $check = $model->where('id', $id)->first();

        if ($check) {
            $data['item'] = $check;

            echo view('education/edit', $data);
        } else {
            return redirect('education');
        }
    }

    public function update($id)
    {
        $model = new EducationModel();
        $check = $model->where('id', $id)->first();

        if ($check) {
            $data['item'] = $check;

            // lakukan validasi
            $validation =  \Config\Services::validation();
            $validation->setRules(
                [
                    'title' => 'required',
                    'major' => 'required',
                    'final_score' => 'required',
                    'date_start' => "required",
                    'date_end' => "required",
                    'desc' => 'required'
                ]
            );
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                $item = new EducationModel();

                $item->update($id, [
                    "title" => $this->request->getPost('title'),
                    "major" => $this->request->getPost('major'),
                    "final_score" => $this->request->getPost('final_score'),
                    "date_start" => $this->request->getPost('date_start'),
                    "date_end" => $this->request->getPost('date_end'),
                    "description" => $this->request->getPost('desc')
                ]);

                return redirect('education');
            }

            echo view('education/edit', $data);
        } else {
            return redirect('education');
        }
    }

    public function delete($id)
    {
        $model = new EducationModel();

        try {
            $model->where('id', $id)->delete();
            return redirect('education');
        } catch (\Throwable $th) {
            return redirect('education');
        }
    }
}
