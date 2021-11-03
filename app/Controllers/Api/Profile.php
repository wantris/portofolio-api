<?php

namespace App\Controllers\Api;

use App\Models\Profile_model;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\Api\CorsController;

class Profile extends ResourceController
{
    use ResponseTrait;

    public function __construct()
    {
        Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
        Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
    }

    public function index()
    {
        $model = new Profile_model();

        $data = $model->orderBy('id', 'DESC')->first();

        if ($data) {
            $data->photo = $data->setPhotoUrl()->photo;
            $arr = [
                'status' => "success",
                'code' => 200,
                'message' => "Get data success",
                'data' => $data
            ];

            return $this->respond($arr, 200);
        } else {
            $arr = [
                'status' => "success",
                'code' => 404,
                'message' => "Data not found",
                'data' => null
            ];

            return $this->respond($arr, 200);
        }
    }

    public function cors()
    {
        $cors = new CorsController;
        $cors->corsHeader();
    }
}
