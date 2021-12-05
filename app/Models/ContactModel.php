<?php namespace App\Models;

use CodeIgniter\Model;
 
class ContactModel extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = "id";
    protected $allowedFields = ['name', 'email', 'subject', 'message', 'readed'];

    protected $returnType = "object";
    protected $useSoftDeletes = true;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}


?>