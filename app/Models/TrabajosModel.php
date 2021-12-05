<?php

namespace App\Models;
use CodeIgniter\Model;

class TrabajosModel extends Model{

    protected $table = "trabajos";
    protected $primaryKey = "id";

    protected $returnType = "object";
    protected $useSoftDeletes = true;

    protected $allowedFields = ["name", "image", "image600", "image1200", "url", "categoria", "descripcion"];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}
?>