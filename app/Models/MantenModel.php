<?php

namespace App\Models;
use CodeIgniter\Model;

class MantenModel extends Model{

    protected $table = "mantenimientos";
    protected $primaryKey = "id";

    protected $returnType = "object";
    protected $useSoftDeletes = true;

    protected $allowedFields = ["image", "text"];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'update_at';
    protected $deletedField  = 'deleted_at';
}
?>