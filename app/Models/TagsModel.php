<?php

namespace App\Models;
use CodeIgniter\Model;

class TagsModel extends Model{

    protected $table = "tags";
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