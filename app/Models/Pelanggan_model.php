<?php

namespace App\Models;

use CodeIgniter\Model;


class Pelanggan_Model extends Model
{
    protected $table      = 'pelanggan';
    protected $primaryKey = 'kd_pelanggan';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'nama',
        'alamat',
        'no_hp',
        'jk',
        'iduser',
        
    ];
     protected $useTimestamps = true;
     protected $dateFormat    = 'datetime';
     protected $createdField  = 'created_at';
     protected $updatedField  = 'updated_at';
}