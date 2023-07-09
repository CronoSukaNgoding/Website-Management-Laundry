<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupHargaModel extends Model
{
    protected $table      = 'group_harga';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

    protected $allowedFields = ['biaya_ambil', 'biaya_jemput',];
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

}