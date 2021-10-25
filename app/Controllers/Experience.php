<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ExperienceModel;

class Experience extends BaseController
{


    public function index()
    {
        $model = new ExperienceModel();

        $data['experiences'] = $model->findAll();

        echo view('experience/index', $data);
    }

    public function create()
    {
        echo view('experience/create');
    }

    public function save()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules(
            [
                'title' => 'required',
                'company' => 'required',
                'date_start' => "required",
                'date_end' => "required",
                'desc' => 'required'
            ]
        );
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $news = new ExperienceModel();

            $news->insert([
                "title" => $this->request->getPost('title'),
                "company" => $this->request->getPost('company'),
                "date_start" => $this->request->getPost('date_start'),
                "date_end" => $this->request->getPost('date_end'),
                "description" => $this->request->getPost('desc')
            ]);

            return redirect('experience');
        }

        echo view('experience/create');
    }

    public function edit($id)
    {
        $model = new ExperienceModel();

        $check = $model->where('id', $id)->first();
        if ($check) {
            $data['item'] = $check;
            echo view('experience/edit', $data);
        } else {
            return redirect('experience');
        }
    }

    public function update($id)
    {
        $model = new ExperienceModel();
        $check = $model->where('id', $id)->first();

        if ($check) {
            $data['item'] = $check;
            // lakukan validasi
            $validation =  \Config\Services::validation();
            $validation->setRules(
                [
                    'title' => 'required',
                    'company' => 'required',
                    'date_start' => "required",
                    'date_end' => "required",
                    'desc' => 'required'
                ]
            );
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                $item = new ExperienceModel();

                $item->update($id, [
                    "title" => $this->request->getPost('title'),
                    "company" => $this->request->getPost('company'),
                    "date_start" => $this->request->getPost('date_start'),
                    "date_end" => $this->request->getPost('date_end'),
                    "description" => $this->request->getPost('desc')
                ]);

                return redirect('experience');
            }

            echo view('experience/edit', $data);
        } else {
            return redirect('experience');
        }
    }

    public function delete($id)
    {
        $model = new ExperienceModel();

        try {
            $model->where('id', $id)->delete();
            return redirect('experience');
        } catch (\Throwable $th) {
            return redirect('experience');
        }
    }
}
