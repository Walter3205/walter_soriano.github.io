<?php

namespace App\Models;
use CodeIgniter\Model;

class ClientesModel extends Model{

    protected $table = "clientes";
    protected $primaryKey = "id";

    protected $returnType = "object";
    protected $useSoftDeletes = true;

    protected $allowedFields = ["name", "image", "cliente_url"];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}
?>