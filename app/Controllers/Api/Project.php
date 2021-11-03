<?php

namespace App\Controllers\Api;

use App\Models\ProjectModel;
use Carbon\Carbon;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Project extends ResourceController
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
            $model = new ProjectModel();
            $projects = $model->findAll();

            if (count($projects) > 0) {
                foreach ($projects as $item) {
                    $item->photo = base_url() . '/uploads/photo-project/' . $item->photo;
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
                'data' => $projects
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
