<?php

namespace App\Controllers\Api;

use App\Models\SkillModel;
use Carbon\Carbon;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Skill extends ResourceController
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
        try {
            $model = new SkillModel();
            $skills = $model->findAll();

            $arr = [
                'status' => "success",
                'code' => 200,
                'message' => "Get data success",
                'data' => $skills
            ];

            return $this->respond($arr, 200);
        } catch (\Throwable $th) {
            $arr = [
                'status' => "failed",
                'code' => 500,
                'message' => "Get data failed",
                'data' => null
            ];

            return $this->respond($arr, 200);
        }
    }
}
