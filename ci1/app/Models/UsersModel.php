<?php

namespace App\Models;

use CodeIgniter\Model;

class Usersmodel extends Model{
  
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $useAutoIncrement = true;

    protected $allowedFields  = [
                    'email',
                    'password',
                    'firstname',
                    'lastname',
                    'phone',
                    'address',
                    'city'
                ];
}

?>