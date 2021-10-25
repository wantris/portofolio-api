<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SkillModel;

class Skill extends BaseController
{
    public function index()
    {
        $model = new SkillModel();

        $data['skills'] = $model->findAll();

        echo view('skill/index', $data);
    }

    public function create()
    {
        echo view('skill/create');
    }

    public function save()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules(
            [
                'title' => 'required',
            ]
        );

        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $news = new SkillModel();

            $news->insert([
                "title" => $this->request->getPost('title'),
            ]);

            return redirect('skill');
        }

        return redirect('skill/create');
    }

    public function edit($id)
    {
        $model = new SkillModel();
        $check = $model->where('id', $id)->first();
        if ($check) {
            $data['item'] = $check;
            echo view('skill/edit', $data);
        } else {
            return redirect('skill');
        }
    }

    public function update($id)
    {
        $model = new SkillModel();
        $check = $model->where('id', $id)->first();

        if ($check) {
            $data['item'] = $check;

            // lakukan validasi
            $validation =  \Config\Services::validation();
            $validation->setRules(
                [
                    'title' => 'required',
                ]
            );
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                $item = new SkillModel();

                $item->update($id, [
                    "title" => $this->request->getPost('title'),
                ]);

                return redirect('skill');
            }

            echo view('skill/edit', $data);
        } else {
            return redirect('skill');
        }
    }

    public function delete($id)
    {
        $model = new SkillModel();

        try {
            $model->where('id', $id)->delete();
            return redirect('skill');
        } catch (\Throwable $th) {
            return redirect('skill');
        }
    }
}
