<?php

namespace App\Models;

use CodeIgniter\Model;


class Pegawai_Model extends Model
{
    protected $table      = 'pegawai';
    protected $primaryKey = 'kd_pegawai';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'nama_pegawai',
        'bagian',
        
    ];
     protected $useTimestamps = true;
     protected $dateFormat    = 'datetime';
     protected $createdField  = 'created_at';
     protected $updatedField  = 'updated_at';
}