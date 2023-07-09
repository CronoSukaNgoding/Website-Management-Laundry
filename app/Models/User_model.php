<?php

namespace App\Models;

use CodeIgniter\Model;


class User_Model extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'username',
        'password',
        'role_id',
        
    ];
     protected $useTimestamps = true;
}