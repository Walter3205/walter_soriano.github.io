<?php

namespace App\Models;
use CodeIgniter\Model;

class PostsTagsModel extends Model{

    protected $table = "posts_tags";
    protected $primaryKey = "id";

    protected $returnType = "object";
    protected $useSoftDeletes = true;

    protected $allowedFields = ["post_id", "tag_id"];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}
?>