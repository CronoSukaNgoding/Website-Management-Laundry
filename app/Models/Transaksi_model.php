<?php

namespace App\Models;

use CodeIgniter\Model;


class Transaksi_Model extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'kd_transaksi';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'id_pemesanan',
        'tgl_ambil',
        'total',
        'berat',
        'id_bayar',
        'total_bayar'
    ];
     protected $useTimestamps = true;
     protected $dateFormat    = 'datetime';
     protected $createdField  = 'created_at';
     protected $updatedField  = 'updated_at';
}
