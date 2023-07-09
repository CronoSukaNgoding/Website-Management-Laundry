<?php

namespace App\Models;

use CodeIgniter\Model;


class Pemesanan_Model extends Model
{
    protected $table      = 'pemesanan';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'kd_pemesanan',
        'jenis',
        'kd_pelanggan',
        'status',
        
    ];
     protected $useTimestamps = true;
     protected $dateFormat    = 'datetime';
     protected $createdField  = 'created_at';
     protected $updatedField  = 'updated_at';
}