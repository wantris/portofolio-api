<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Profile extends Entity
{
    // protected $datamap = [];
    // protected $dates   = [
    //     'created_at',
    //     'updated_at',
    //     'deleted_at',
    // ];
    // protected $casts   = [];
    public function setPhotoUrl()
    {
        $this->attributes['photo'] = base_url() . '/uploads/photo/' . $this->attributes['photo'];

        return $this;
    }
}
