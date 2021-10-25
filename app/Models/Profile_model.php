<?php

namespace App\Models;

use CodeIgniter\Model;

class Profile_model extends Model
{
    protected $table = "profile";
    protected $primaryKey = "id";

    protected $returnType = 'App\Entities\Profile';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['first_name', 'last_name', 'phone', 'email', 'address', 'description', 'photo'];

    // protected $appends = ['photo_url'];

    // public function getPhotoUrl()
    // {
    //     $this->attributes['photo'] = base_url() . '/uploads/photo/' . $this->attributes['photo'];

    //     return $this;
    // }
}
