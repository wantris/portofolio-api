<?php

namespace App\Models;

use CodeIgniter\Model;

class SkillModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'skill';
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;

    protected $returnType = 'App\Entities\Skill';

    protected $allowedFields = ['title'];
}
