<?php

namespace App\Models;

use CodeIgniter\Model;


class Profile_Model extends Model
{
    protected $table      = 'profile';
    protected $primaryKey = 'kd_profile';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'nama_laundry',
        'alamat_laundry',
        'no_tlp',
        
    ];
     protected $useTimestamps = false;
    //  protected $dateFormat    = 'datetime';
    //  protected $createdField  = 'created_at';
    //  protected $updatedField  = 'updated_at';
}