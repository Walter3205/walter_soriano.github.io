<?php

namespace App\Models;
use CodeIgniter\Model;

class PostsModel extends Model{

    protected $table = "posts";
    protected $primaryKey = "id";

    protected $returnType = "object";
    protected $useSoftDeletes = true;

    protected $allowedFields = ["name", "slug", "extract", "body", "tipo", "miniatura", "status", "user_id",
        "category_id"];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}
?>