<?php

namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model{

    protected $table = "users";
    protected $primaryKey = "id";

    protected $returnType = "object";
    protected $useSoftDeletes = true;

    protected $allowedFields = ["firstname", "lastname", "email", 
        "password", "role_id", "image"];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
?>