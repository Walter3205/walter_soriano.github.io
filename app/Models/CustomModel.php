<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CustomModel{

    protected $db;

    public function __construct(ConnectionInterface &$db){
        $this->db =& $db;
    }

    public function get_count() 
	{
        $builder = $this->db->table('posts');
        $builder->where('posts.status = ', '1');
        return $builder->countAllResults();
    }

    public function get_count_user($id) 
	{
        $builder = $this->db->table('posts');
        $builder->where('posts.status = ', '1');
        $builder->where('posts.user_id = ', $id);
        return $builder->countAllResults();
    }

    public function get_count_category($slug) 
	{
        $builder = $this->db->table('posts');
        $builder->join('categories', 'posts.category_id = categories.id');
        $builder->where('posts.status = ', '1');
        $builder->where('categories.slug = ', $slug);
        return $builder->countAllResults();
    }

    public function get_count_tag($slug) 
	{
        $builder = $this->db->table('posts');
        $builder->join('posts_tags', 'posts.id = posts_tags.post_id', 'left');
        $builder->join('tags', 'posts_tags.tag_id = tags.id', 'left');
        $builder->where('posts.status = ', '1');
        $builder->where('tags.slug = ', $slug);
        $builder->where('posts_tags.deleted_at = ', 'NULL');
        return $builder->countAllResults();
    }

    function PostsBlog($limit, $start){
        $builder = $this->db->table('posts');
        $builder->limit($limit, $start);
        $builder->select('posts.id, posts.name as name, posts.slug as slug, posts.extract, posts.body, 
            posts.tipo, posts.miniatura, posts.updated_at as fecha, users.firstname, users.id as usuario, 
            categories.name as category, categories.slug as cat_slug ');
        $builder->join('users', 'posts.user_id = users.id');
        $builder->join('categories', 'posts.category_id = categories.id');
        //$builder->join('posts_tags', 'posts.id = posts_tags.post_id');
        //$builder->join('tags', 'posts_tags.tag_id = tags.id');
        $builder->where('posts.status = ', '1');
        //$builder->where('posts_tags.deleted_at = ', 'NULL');
        $builder->orderBy('posts.updated_at', 'DESC');
        //$builder->where('posts.id = ', $id);
        $post = $builder->get()->getResult();

        return $post;
    }

    function PostShow($slug){
        $builder = $this->db->table('posts');
        $builder->limit('1');
        $builder->select('posts.id, posts.name as name, posts.slug as slug, posts.extract, posts.body,   
            posts.tipo, posts.miniatura, posts.updated_at as fecha, users.firstname, users.id as usuario,
            categories.name as category, categories.slug as cat_slug ');
        $builder->join('users', 'posts.user_id = users.id');
        $builder->join('categories', 'posts.category_id = categories.id');
        //$builder->join('posts_tags', 'posts.id = posts_tags.post_id');
        //$builder->join('tags', 'posts_tags.tag_id = tags.id');
        $builder->where('posts.status = ', '1');
        $builder->where('posts.slug = ', $slug);
        //$builder->where('posts_tags.deleted_at = ', 'NULL');
        //$builder->orderBy('posts.updated_at', 'DESC');
        $post = $builder->get()->getResult();

        return $post;
    }

    function PostCategory($limit, $start, $slug){
        $builder = $this->db->table('posts');
        $builder->limit($limit, $start);
        $builder->select('posts.id, posts.name as name, posts.slug as slug, posts.extract, posts.body,   
            posts.tipo, posts.miniatura, posts.updated_at as fecha, users.firstname, users.id as usuario,
            categories.name as category, categories.slug as cat_slug ');
        $builder->join('users', 'posts.user_id = users.id');
        $builder->join('categories', 'posts.category_id = categories.id');
        //$builder->join('posts_tags', 'posts.id = posts_tags.post_id');
        //$builder->join('tags', 'posts_tags.tag_id = tags.id');
        $builder->where('posts.status = ', '1');
        $builder->where('categories.slug = ', $slug);
        //$builder->where('posts_tags.deleted_at = ', 'NULL');
        $builder->orderBy('posts.updated_at', 'DESC');
        $post = $builder->get()->getResult();

        return $post;
    }

    function PostTag($limit, $start, $slug){
        $builder = $this->db->table('posts');
        $builder->limit($limit, $start);
        $builder->select('posts.id, posts.name as name, posts.slug as slug, posts.extract, posts.body,   
            posts.tipo, posts.miniatura, posts.updated_at as fecha, users.firstname, users.id as usuario,
            categories.name as category, categories.slug as cat_slug ');
        $builder->join('users', 'posts.user_id = users.id');
        $builder->join('categories', 'posts.category_id = categories.id');
        $builder->join('posts_tags', 'posts.id = posts_tags.post_id', 'left');
        $builder->join('tags', 'posts_tags.tag_id = tags.id', 'left');
        $builder->where('posts.status = ', '1');
        $builder->where('tags.slug = ', $slug);
        $builder->where('posts_tags.deleted_at = ', 'NULL');
        $builder->orderBy('posts.updated_at', 'DESC');
        $post = $builder->get()->getResult();

        return $post;
    }

    function PostUser($limit, $start, $id){
        $builder = $this->db->table('posts');
        $builder->limit($limit, $start);
        $builder->select('posts.id, posts.name as name, posts.slug as slug, posts.extract, posts.body,   
            posts.tipo, posts.miniatura, posts.updated_at as fecha, users.firstname, users.id as usuario,
            categories.name as category, categories.slug as cat_slug ');
        $builder->join('users', 'posts.user_id = users.id');
        $builder->join('categories', 'posts.category_id = categories.id');
        //$builder->join('posts_tags', 'posts.id = posts_tags.post_id');
        //$builder->join('tags', 'posts_tags.tag_id = tags.id');
        $builder->where('posts.status = ', '1');
        $builder->where('users.id = ', $id);
        //$builder->where('posts_tags.deleted_at = ', 'NULL');
        $builder->orderBy('posts.updated_at', 'DESC');
        $post = $builder->get()->getResult();

        return $post;
    }

    function getPost($id){
        $builder = $this->db->table('posts');
        $builder->select('posts.id, posts.name as name, posts.slug, posts.extract, posts.body, posts.tipo, posts.miniatura, 
            posts.status, posts.category_id');
        $builder->join('users', 'posts.user_id = users.id');
        //$builder->join('categories', 'posts.category_id = categories.id');
        //$builder->join('posts_tags', 'posts.id = posts_tags.post_id');
        //$builder->join('tags', 'posts_tags.tag_id = tags.id');
        //$builder->where('posts_tags.deleted_at = ', 'NULL');
        $builder->where('posts.id = ', $id);
        $post = $builder->get()->getResult();

        return $post;
    }

    function getPostsIndex($id){
        $builder = $this->db->table('posts');
        $builder->select('posts.id, posts.name, posts.slug, (CASE WHEN posts.status = "0" then "Borrador" 
            ELSE "Publicado" END) as status, categories.name as category, users.firstname as usuario');
        $builder->join('users', 'posts.user_id = users.id');
        $builder->join('categories', 'posts.category_id = categories.id');
        $builder->where('posts.deleted_at = ', '0000-00-00 00:00:00');
        $builder->where('posts.user_id = ', $id);
        $posts = $builder->get()->getResult();

        return $posts;
    }

    function getUsers($id){
        $builder = $this->db->table('users');
        $builder->select('users.*, roles.name');
        $builder->join('roles', 'users.role_id = roles.id');
        $builder->where('users.id <> ', $id);
        $builder->where('users.deleted_at = ', 'NULL');
        $users = $builder->get()->getResult();

        return $users;
    }

    function getMails(){
        $builder = $this->db->table('contacts');
        $builder->select('id, name, email, subject, SUBSTRING(message, 1, (90 - (LENGTH(subject)))) as message, created_at');
        $builder->where('readed = ', 'F');
        $builder->orderBy('created_at', 'DESC');
        $mails = $builder->get()->getResult();

        return $mails;
    }

    function getPrevMail($id, $fecha){
        $builder = $this->db->table('contacts');
        $builder->select('id');
        $builder->where('created_at >= ', $fecha);
        $builder->where('id <> ', $id);
        $builder->orderBy('created_at', 'DESC');
        $builder->limit(1);
        $prev = $builder->get()->getResult();
        return $prev;
    }

    function getNextMail($id, $fecha){
        $builder = $this->db->table('contacts');
        $builder->select('id');
        $builder->where('created_at <= ', $fecha);
        $builder->where('id <> ', $id);
        $builder->orderBy('created_at', 'DESC');
        $builder->limit(1);
        $prev = $builder->get()->getResult();
        return $prev;
    }
}
