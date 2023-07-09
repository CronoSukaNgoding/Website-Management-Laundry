<?php

namespace App\Models;

use CodeIgniter\Model;


class Jenis_Model extends Model
{
    protected $table      = 'jenispakaian';
    protected $primaryKey = 'idjenispakaian';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'jenis',
        'harga',
        'statusbiaya',
        
    ];
     protected $useTimestamps = true;
     protected $dateFormat    = 'datetime';
     protected $createdField  = 'created_at';
     protected $updatedField  = 'updated_at';
}