<?php

namespace App\Controllers\Api;

use App\Models\ExperienceModel;
use Carbon\Carbon;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Experience extends ResourceController
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
        $model = new ExperienceModel();
        $experiences = $model->findAll();

        if (count($experiences) > 0) {
            foreach ($experiences as $item) {
                $date_start = Carbon::parse($item->date_start);
                $date_start = $date_start->isoFormat('MMMM Y');

                $date_end = Carbon::parse($item->date_end);
                $date_end = $date_end->isoFormat('MMMM Y');

                $item->date_start = $date_start;
                $item->date_end = $date_end;
            }
        }

        $arr = [
            'status' => "success",
            'code' => 200,
            'message' => "Get data success",
            'data' => $experiences
        ];

        return $this->respond($arr, 200);
    }
}
