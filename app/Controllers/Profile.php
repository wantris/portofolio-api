<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Profile_model;

class Profile extends BaseController
{
    public function index()
    {
        $model = new Profile_model();

        $data['profile'] = $model->orderBy('id', 'DESC')->first();

        echo view('profile/index', $data);
    }

    public function create()
    {
        echo view('profile/add');
    }

    public function save()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => "required",
                'address' => "required",
                'desc' => 'required'
            ]
        );
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $news = new Profile_model();
            $dataBerkas = $this->request->getFile('photo');
            $fileName = $dataBerkas->getRandomName();

            $news->insert([
                "first_name" => $this->request->getPost('first_name'),
                "last_name" => $this->request->getPost('last_name'),
                "phone" => $this->request->getPost('phone'),
                "email" => $this->request->getPost('email'),
                "address" => $this->request->getPost('address'),
                "description" => $this->request->getPost('desc'),
                "photo" => $fileName
            ]);

            $dataBerkas->move('uploads/photo/', $fileName);

            return redirect('profile');
        }

        echo view('profile/add');
    }

    public function edit($id)
    {
        $model = new Profile_model();

        $search = $model->where('id', $id)->first();

        if ($search) {
            $data['profile'] = $search;
            echo view('profile/edit', $data);
        } else {
            return redirect('profile');
        }

        // return redirect('profile');
    }

    public function update($id)
    {
        $model = new Profile_model();
        $search = $model->where('id', $id)->first();

        if ($search) {
            $data['profile'] = $search;

            // lakukan validasi
            $validation =  \Config\Services::validation();
            $validation->setRules(
                [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => 'required',
                    'phone' => "required",
                    'address' => "required",
                    'desc' => 'required'
                ]
            );
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                $news = new Profile_model();
                $fileName = $this->request->getPost('oldPhoto');

                if ($this->request->getPost('photo')) {
                    $dataBerkas = $this->request->getFile('photo');
                    $fileName = $dataBerkas->getRandomName();
                    $dataBerkas->move('uploads/photo/', $fileName);
                }

                $news->update($id, [
                    "first_name" => $this->request->getPost('first_name'),
                    "last_name" => $this->request->getPost('last_name'),
                    "phone" => $this->request->getPost('phone'),
                    "email" => $this->request->getPost('email'),
                    "address" => $this->request->getPost('address'),
                    "description" => $this->request->getPost('desc'),
                    "photo" => $fileName
                ]);



                return redirect('profile');
            }

            echo view('profile/edit', $data);
        } else {
            echo view('profile');
        }
    }
}
