<?php

namespace App\Models;
use CodeIgniter\Model;

class CategoriesModel extends Model{

    protected $table = "categories";
    protected $primaryKey = "id";

    protected $returnType = "object";
    protected $useSoftDeletes = true;

    protected $allowedFields = ["name", "slug"];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}
?>