<?php

namespace App\Models;

use CodeIgniter\Model;

class ExperienceModel extends Model
{
    protected $table = "experience";
    protected $primaryKey = "id";

    protected $returnType = 'App\Entities\Experience';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['title', 'description', 'company', 'date_start', 'date_end'];
}
