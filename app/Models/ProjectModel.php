<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'project';
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;

    protected $returnType = 'App\Entities\Project';

    protected $allowedFields = ['title', 'description', 'date_start', 'date_end', 'photo', 'link'];
}
