<?php 
namespace App\Controllers;

use App\Models\PostsModel;
use App\Models\CategoriesModel;
use App\Models\CustomModel;
use App\Models\MantenModel;
use App\Models\UsersModel;
use App\Models\TagsModel;
use App\Models\PostsTagsModel;

class Blog extends BaseController
{
    public function __construct()
    {
		$db = db_connect();
		$this->usermodel = new UsersModel();
		$this->postmodel = new PostsModel();
		$this->custommodel = new CustomModel($db);
		$this->categorymodel = new CategoriesModel();
		$this->tagsmodel = new TagsModel();
		$this->poststagsmodel = new PostsTagsModel();
		$this->mantenmodel = new MantenModel();
		$this->session = session();
		helper(['form', 'url']);
		$this->pager = \Config\Services::pager();
	}

	public function loadViews($view=null, $data=null){
		echo view("Admin/layout/head");
		echo view("Admin/layout/header",  $data);
		echo view("Admin/".$view, $data);
		//echo view("Admin/layout/footer");
	}

	public function loadViewsBlog($view=null, $data=null)
	{
		echo view("Blog/layout/head", $data);
		echo view("Blog/layout/header", $data);
		echo view("Blog/".$view, $data);
		echo view("Blog/layout/footer");
	}

	public function home(){
		$config = array();
        $config["total_rows"] = $this->custommodel->get_count();
        $config["per_page"] = 6;
        $config["uri_segment"] = 2;

		$page = ($this->request->getGet('page'))? $this->request->getGet('page') - 1 : 0;

		$data["links"] = $this->pager->makeLinks($page, $config["per_page"], $config["total_rows"],'blog_pager' );
		$data['segment'] =  $this->request->uri->getSegment(1);
		$data['manten'] = $this->mantenmodel->findAll();
		$data['categorias'] = $this->categorymodel->findAll();
		$data['post_tags'] = $this->poststagsmodel->findAll();
		$data['posts'] = $this->custommodel->PostsBlog($config["per_page"], $page);
		$count = 0;
		foreach ($data['posts'] as $post){
			$count2 = 0;
			foreach ($data['post_tags'] as $post_tag) {
				if ($post->id == $post_tag->post_id) {
					$tag = $this->tagsmodel->where('id', $post_tag->tag_id)->first();
					$data['posts'][$count]->tags[$count2] = $tag;
					$count2++;
				}
			}
			$count++;
		}
		$this->loadViewsBlog('principal', $data);
		//return view('Blog/index', $data);
	}

	public function user($id){
		$usuario = $this->usermodel->where('id', $id)->first();
		if ($usuario) {
			$config = array();
			$config["total_rows"] = $this->custommodel->get_count_user($id);
			$config["per_page"] = 6;
			$config["uri_segment"] = 2;

			$page = ($this->request->getGet('page'))? $this->request->getGet('page') - 1 : 0;

			$data["links"] = $this->pager->makeLinks($page, $config["per_page"], $config["total_rows"],'blog_pager' );
			$data['segment'] =  $this->request->uri->getSegment(1);
			$data['manten'] = $this->mantenmodel->findAll();
			$data['categorias'] = $this->categorymodel->findAll();
			$data['post_tags'] = $this->poststagsmodel->findAll();
			$data['posts'] = $this->custommodel->PostUser($config["per_page"], $page, $id);
			$count = 0;
			foreach ($data['posts'] as $post){
				$count2 = 0;
				foreach ($data['post_tags'] as $post_tag) {
					if ($post->id == $post_tag->post_id) {
						$tag = $this->tagsmodel->where('id', $post_tag->tag_id)->first();
						$data['posts'][$count]->tags[$count2] = $tag;
						$count2++;
					}
				}
				$count++;
			}
			if ($data['posts']) {
				$this->loadViewsBlog('user', $data);
			}else {
				return redirect()->to(base_url('blog'));
			}
		}else {
			return redirect()->to(base_url('blog'));
		}
		//return view('Blog/index', $data);
	}

	public function category($slug){
		$categoria = $this->categorymodel->where('slug', $slug)->first();
		if ($categoria) {
			$config = array();
			$config["total_rows"] = $this->custommodel->get_count_category($slug);
			$config["per_page"] = 6;

			$page = ($this->request->getGet('page'))? $this->request->getGet('page') - 1 : 0;

			$data["links"] = $this->pager->makeLinks($page, $config["per_page"], $config["total_rows"], 'blog_pager');
			$data['segment'] =  $this->request->uri->getSegment(1);
			$data['manten'] = $this->mantenmodel->findAll();
			$data['categorias'] = $this->categorymodel->findAll();
			$data['post_tags'] = $this->poststagsmodel->findAll();
			$data['posts'] = $this->custommodel->PostCategory($config["per_page"], $page, $slug);
			$count = 0;
			foreach ($data['posts'] as $post){
				$count2 = 0;
				foreach ($data['post_tags'] as $post_tag) {
					if ($post->id == $post_tag->post_id) {
						$tag = $this->tagsmodel->where('id', $post_tag->tag_id)->first();
						$data['posts'][$count]->tags[$count2] = $tag;
						$count2++;
					}
				}
				$count++;
			}
			if ($data['posts']) {
				$this->loadViewsBlog('category', $data);
			}else {
				return redirect()->to(base_url('blog'));
			}
		}else {
			return redirect()->to(base_url('blog'));
		}
	}

	public function tag($slug){
		$tag = $this->tagsmodel->where('slug', $slug)->first();
		if ($tag) {
			$config = array();
			$config["total_rows"] = $this->custommodel->get_count_tag($slug);
			$config["per_page"] = 6;

			$page = ($this->request->getGet('page'))? $this->request->getGet('page') - 1 : 0;

			$data["links"] = $this->pager->makeLinks($page, $config["per_page"], $config["total_rows"], 'blog_pager');
			$data['segment'] =  $this->request->uri->getSegment(1);
			$data['manten'] = $this->mantenmodel->findAll();
			$data['categorias'] = $this->categorymodel->findAll();
			$data['post_tags'] = $this->poststagsmodel->findAll();
			$data['posts'] = $this->custommodel->PostTag($config["per_page"], $page, $slug);
			$count = 0;
			foreach ($data['posts'] as $post){
				$count2 = 0;
				foreach ($data['post_tags'] as $post_tag) {
					if ($post->id == $post_tag->post_id) {
						$tag = $this->tagsmodel->where('id', $post_tag->tag_id)->first();
						$data['posts'][$count]->tags[$count2] = $tag;
						$count2++;
					}
				}
				$count++;
			}
			if ($data['posts']) {
				$this->loadViewsBlog('tag', $data);
			}else {
				return redirect()->to(base_url('blog'));
			}
		}else {
			return redirect()->to(base_url('blog'));
		}
	}

	public function right_sidebar()
	{
		$config = array();
        $config["total_rows"] = $this->custommodel->get_count();
        $config["per_page"] = 6;
        $config["uri_segment"] = 2;

		$page = ($this->request->getGet('page'))? $this->request->getGet('page') - 1 : 0;

		$data["links"] = $this->pager->makeLinks($page, $config["per_page"], $config["total_rows"],'blog_pager' );
		$data['segment'] =  $this->request->uri->getSegment(1);
		$data['manten'] = $this->mantenmodel->findAll();
		$data['categorias'] = $this->categorymodel->findAll();
		$data['post_tags'] = $this->poststagsmodel->findAll();
		$data['tags'] = $this->tagsmodel->findAll();
		$data['latest_posts'] = $this->postmodel->where('status', '1')->limit('4')->orderBy('updated_at','DESC')->find();
		$data['posts'] = $this->custommodel->PostsBlog($config["per_page"], $page);
		$count = 0;
		foreach ($data['posts'] as $post){
			$count2 = 0;
			foreach ($data['post_tags'] as $post_tag) {
				if ($post->id == $post_tag->post_id) {
					$tag = $this->tagsmodel->where('id', $post_tag->tag_id)->first();
					$data['posts'][$count]->tags[$count2] = $tag;
					$count2++;
				}
			}
			$count++;
		}
		$this->loadViewsBlog('right_sidebar', $data);
		//print_r($data['latest_posts']);
	}

	public function left_sidebar()
	{
		$config = array();
        $config["total_rows"] = $this->custommodel->get_count();
        $config["per_page"] = 6;
        $config["uri_segment"] = 2;

		$page = ($this->request->getGet('page'))? $this->request->getGet('page') - 1 : 0;

		$data["links"] = $this->pager->makeLinks($page, $config["per_page"], $config["total_rows"],'blog_pager' );
		$data['segment'] =  $this->request->uri->getSegment(1);
		$data['manten'] = $this->mantenmodel->findAll();
		$data['categorias'] = $this->categorymodel->findAll();
		$data['post_tags'] = $this->poststagsmodel->findAll();
		$data['tags'] = $this->tagsmodel->findAll();
		$data['latest_posts'] = $this->postmodel->where('status', '1')->limit('4')->orderBy('updated_at','DESC')->find();
		$data['posts'] = $this->custommodel->PostsBlog($config["per_page"], $page);
		$count = 0;
		foreach ($data['posts'] as $post){
			$count2 = 0;
			foreach ($data['post_tags'] as $post_tag) {
				if ($post->id == $post_tag->post_id) {
					$tag = $this->tagsmodel->where('id', $post_tag->tag_id)->first();
					$data['posts'][$count]->tags[$count2] = $tag;
					$count2++;
				}
			}
			$count++;
		}
		$this->loadViewsBlog('left_sidebar', $data);
		//print_r($data['latest_posts']);
	}

	public function full_width(){
		$config = array();
        $config["total_rows"] = $this->custommodel->get_count();
        $config["per_page"] = 6;
        $config["uri_segment"] = 2;

		$page = ($this->request->getGet('page'))? $this->request->getGet('page') - 1 : 0;

		$data["links"] = $this->pager->makeLinks($page, $config["per_page"], $config["total_rows"],'blog_pager' );
		$data['segment'] =  $this->request->uri->getSegment(1);
		$data['manten'] = $this->mantenmodel->findAll();
		$data['categorias'] = $this->categorymodel->findAll();
		$data['post_tags'] = $this->poststagsmodel->findAll();
		$data['posts'] = $this->custommodel->PostsBlog($config["per_page"], $page);
		$count = 0;
		foreach ($data['posts'] as $post){
			$count2 = 0;
			foreach ($data['post_tags'] as $post_tag) {
				if ($post->id == $post_tag->post_id) {
					$tag = $this->tagsmodel->where('id', $post_tag->tag_id)->first();
					$data['posts'][$count]->tags[$count2] = $tag;
					$count2++;
				}
			}
			$count++;
		}
		$this->loadViewsBlog('full_width', $data);
		//return view('Blog/index', $data);
	}

	public function post($slug){
		$data['segment'] =  $this->request->uri->getSegment(1);
		$data['manten'] = $this->mantenmodel->findAll();
		$data['categorias'] = $this->categorymodel->findAll();
		$data['post_tags'] = $this->poststagsmodel->findAll();
		$data['posts'] = $this->custommodel->PostShow($slug);
		$count = 0;
		foreach ($data['posts'] as $post){
			$count2 = 0;
			foreach ($data['post_tags'] as $post_tag) {
				if ($post->id == $post_tag->post_id) {
					$tag = $this->tagsmodel->where('id', $post_tag->tag_id)->first();
					$data['posts'][$count]->tags[$count2] = $tag;
					$count2++;
				}
			}
			$count++;
		}
		if ($data['posts']) {
			$this->loadViewsBlog('show', $data);
		}else {
			return redirect()->to(base_url('blog'));
		}
	}

	public function index(){
		$data['segment'] =  $this->request->uri->getSegment(3);
		
		$email = $this->session->email;
        if (!$email) {
            return redirect()->to(base_url().'/login');
        } else {
			$data['user'] =  $this->usermodel->where('email', $email)
				  ->first();
			$data['posts'] = $this->custommodel->getPostsIndex($data['user']->id);
			$data['success'] = $this->session->getFlashdata('success');
			$data['warning'] = $this->session->getFlashdata('warning');		
			$this->loadViews('posts/index', $data);
        }
	}

	public function create(){
		$data['segment'] =  $this->request->uri->getSegment(3);
		
		$email = $this->session->email;
        if (!$email) {
            return redirect()->to(base_url().'/login');
        } else {
			if($this->session->has('error')){
                $data['error'] = $this->session->error;
            }
            $data['user'] =  $this->usermodel->where('email', $email)
				  ->first();
			$data['categories'] = $this->categorymodel->findAll();
			$data['tags'] = $this->tagsmodel->findAll();
			if ($data['categories']) {
				$this->loadViews('posts/create', $data);
			}else {
				$this->session->setflashdata('warning','Debe crear almenos una categoria.');
				return redirect()->to(base_url().'/dashboard/blog/posts');
			}
        }
	}

	public function store(){
		//print_r($this->request);
		//$data = $this->request->getPost('tags');
		//var_dump($data);
		//$validation =  \Config\Services::validation();

		if ($this->request->getMethod() == 'post') {
			$validation = [
					'name' => [
                        'rules' => 'required|is_unique[posts.name]',
                        'errors' => [
                            'is_unique' => 'Ya se encuentra un Post con este mismo Título'
                        ]
                    ],
                    'slug'   =>  [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'El campo Slug es requerido'
                        ]
                    ],
					'status' => [
                        'rules' => 'required|in_list[0,1]',
                        'errors' => [
                            'in_list' => 'Status no es válido'
                        ]
					],
					'category' => [
                        'rules' => 'required|is_not_unique[categories.id]',
                        'errors' => [
                            'is_not_unique' => 'Categoría no válida'
                        ]
					],
					'tipo' => [
                        'rules' => 'required|in_list[imagen,video]',
                        'errors' => [
                            'in_list' => 'Tipo miniatura no es válido'
                        ]
                    ]
            ];

			if(!$this->validate($validation)){
                return redirect()->to(base_url('dashboard/blog/posts/create'))
                        ->withInput()->with('error', $this->validator);
			}
			
			if(isset($this->session->id)){
				//$id = $this->request->getPost('id');
				$name = $this->request->getPost('name');
				$slug = $this->request->getPost('slug');
				$status = $this->request->getPost('status');
				$category = $this->request->getPost('category');
				$tipo = $this->request->getPost('tipo');
				$extract = $this->request->getPost('extract');
				$body = $this->request->getPost('body');
				//$miniatura = "";
				
				if($status == "1"){
					$validation = [
						'extract' =>  [
							'rules' => 'required',
							'errors' => [
								'required' => 'El campo Extract es requerido para publicar el post'
							]
						],
						'body'   =>  [
							'rules' => 'required',
							'errors' => [
								'required' => 'El campo Contenido del post es requerido para publicar el post'
							]
						]
					];

					if(!$this->validate($validation)){
						return redirect()->to(base_url('dashboard/blog/posts/create'))
								->withInput()->with('error', $this->validator);
					}
					
					$body = $this->fixvid($body);

					if($tipo == "video"){
						$validation = [
							'video_miniatura' =>  [
								'rules' => 'required|valid_url',
								'errors' => [
									'valid_url' => 'El campo Video de miniatura no contiene una URL válida'
								]
							]
						];
	
						if(!$this->validate($validation)){
							return redirect()->to(base_url('dashboard/blog/posts/create'))
									->withInput()->with('error', $this->validator);
						}
						$miniatura = $this->request->getPost('video_miniatura');
	
						//$data['miniatura'] = $miniatura;
					}elseif($tipo == "imagen") {
						$validation = [
							'miniatura' =>  [
								'rules' => 'is_image[miniatura]',
								'errors' => [
									'is_image' => 'El campo Imagen de Miniatura no es válido'
								]
							]
						];
						
						if(!$this->validate($validation)){
							return redirect()->to(base_url('dashboard/blog/posts/create'))
									->withInput()->with('error', $this->validator);
						}
						$miniatura = $this->request->getFile('miniatura');
	
						if($miniatura->isValid()){
							$nuevoNombre = $miniatura->getRandomName();
							$miniatura->move(ROOTPATH."public/images/blog", $nuevoNombre);
							$nurl = 'images/blog/'.$nuevoNombre;
							$miniatura = $nurl;
							//$data['miniatura'] = $miniatura;
						}
					}
				}else {
					if($tipo == "video"){
						$miniatura = $this->request->getPost('video_miniatura');
						
						//$data['miniatura'] = $miniatura;
					}elseif($tipo == "imagen") {
						$miniatura = $this->request->getFile('miniatura');
	
						if($miniatura->isValid()){
							$nuevoNombre = $miniatura->getRandomName();
							$miniatura->move(ROOTPATH."public/images/blog", $nuevoNombre);
							$nurl = 'images/blog/'.$nuevoNombre;
							$miniatura = $nurl;
							//$data['miniatura'] = $miniatura;
						}
					}
				}

				$data = [
                    'name' => $name,
                    'slug' => $slug,
					'status' => $status,
					'extract' => $extract,
					'body' => $body,
                    'tipo' => $tipo,
					'miniatura' => $miniatura,
					'category_id' => $category,
					'user_id' => $this->session->id
                ];
            
				$this->postmodel->insert($data);

				$tags = $this->request->getPost('tags');
				if(isset($tags)){
					$post_id =  $this->postmodel->where('name', $name)->first();
					foreach ($tags as $tag) {
						$data = [
							'post_id' => $post_id->id,
							'tag_id' => $tag
						];
						$this->poststagsmodel->insert($data);
					}
				}
				
				$this->session->setflashdata('success','El Post se ha creado correctamente.');
				return redirect()->to(base_url().'/dashboard/blog/posts');
			}else {
				return redirect()->to(base_url().'/login');
			}
		}
		return redirect()->to(base_url().'/dashboard/blog/posts/create');
	}

	public function fixvid($body, $offset = null)
	{
		
		$pos = strpos($body, '<iframe', $offset);
		$div = '<div class="embed-responsive embed-responsive-16by9 su-youtube" style="width: 60%; height: 50%;">';
		$class = ' embed-responsive-item"></iframe></div>';
		//var_dump($body);
		if ($pos) {
			$verif = strpos($body, '<div class="embed-responsive', $offset);
			if (!$verif) {
				//print_r($pos);
				$first = substr($body, 0, $pos);
				$last = substr($body, $pos, strlen($body));
				$serach = 'class="note-video-clip';
				$pos2 = strpos($last, $serach);
				$pos3 =  strpos($body, '</iframe>');
				$third = substr($body, $pos3+9, strlen($body));
				$second = substr($last, 0, $pos2+strlen($serach));
				
				
				$body = $first . $div . $second . $class . $third;
				
				//print_r(htmlspecialchars($body));
				
				//print_r(htmlspecialchars($body));
				$pos = strpos($body, '<iframe');
				$hasmore = strpos($body, '<iframe', $pos+1);
				if ($hasmore) {
					//print_r(htmlspecialchars($body));
					$this->fixvid($body, $hasmore);
				}else {
					print_r(htmlspecialchars($body));
				}
			}
		}else {
			$pos = strpos($body, '<iframe');
			$hasmore = strpos($body, '<iframe', $pos+1);
			if ($hasmore) {
				//print_r(htmlspecialchars($body));
				$this->fixvid($body, $hasmore);
			}else {
				print_r(htmlspecialchars($body));
			}
		}

		return $body;
	}

	public function edit($id = false){
		$data['segment'] =  $this->request->uri->getSegment(3);
		
		$email = $this->session->email;
        if (!$email) {
            return redirect()->to(base_url().'/login');
        } else {
			$post = $this->postmodel->find($id);
			if(!isset($post)){
				return redirect()->to(base_url().'/dashboard/blog/posts');
			}else {
				$data['post'] = $this->custommodel->getPost($id);
			}
			if($this->session->has('error')){
                $data['error'] = $this->session->error;
            }
            $data['user'] =  $this->usermodel->where('email', $email)
				->first();
			$data['categories'] = $this->categorymodel->findAll();
			$data['tags'] = $this->tagsmodel->findAll();
			$data['OldTags'] = $this->poststagsmodel->where('post_id', $id)->findColumn('tag_id');
			//var_dump($data);
			//$object = (object)array_map(function($item) { return is_array($item) ? (object)$item :  $item;  }, $data);
			//print_r($data);		
			$this->loadViews('posts/edit', $data);
        }
	}

	public function update($id = false){
		if ($this->request->getMethod() == 'post') {
			$validation = [
					'name' => [
                        'rules' => 'required|is_unique[posts.name,id,'.$id.']',
                        'errors' => [
                            'is_unique' => 'Ya se encuentra un Post con este mismo Título'
                        ]
                    ],
                    'slug'   =>  [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'El campo Slug es requerido'
                        ]
                    ],
					'status' => [
                        'rules' => 'required|in_list[0,1]',
                        'errors' => [
                            'in_list' => 'Status no es válido'
                        ]
					],
					'category' => [
                        'rules' => 'required|is_not_unique[categories.id]',
                        'errors' => [
                            'is_not_unique' => 'Categoría no válida'
                        ]
					],
					'tipo' => [
                        'rules' => 'required|in_list[imagen,video]',
                        'errors' => [
                            'in_list' => 'Tipo miniatura no es válido'
                        ]
                    ]
            ];

			if(!$this->validate($validation)){
                return redirect()->to(base_url('dashboard/blog/posts/'.$id))
                        ->withInput()->with('error', $this->validator);
			}
			
			if(isset($this->session->id)){
				$old = $this->postmodel->find($id);
					if(isset($old)){
					$name = $this->request->getPost('name');
					$slug = $this->request->getPost('slug');
					$status = $this->request->getPost('status');
					$category = $this->request->getPost('category');
					$tipo = $this->request->getPost('tipo');
					$extract = $this->request->getPost('extract');
					$body = $this->request->getPost('body');
					$miniatura = '';
				
					if($status == '1'){
						$validation = [
							'extract' =>  [
								'rules' => 'required',
								'errors' => [
									'required' => 'El campo Extract es requerido para publicar el post'
								]
							],
							'body'   =>  [
								'rules' => 'required',
								'errors' => [
									'required' => 'El campo Contenido del post es requerido para publicar el post'
								]
							]
						];

						if(!$this->validate($validation)){
							return redirect()->to(base_url('dashboard/blog/posts/'.$id))
									->withInput()->with('error', $this->validator);
						}

						$body = $this->fixvid($body);

						if ($old->miniatura == "" || $old->miniatura == NULL) {
							if($tipo == "video"){
								$validation = [
									'video_miniatura' =>  [
										'rules' => 'required|valid_url',
										'errors' => [
											'valid_url' => 'El campo Video de miniatura no contiene una URL válida'
										]
									]
								];
			
								if(!$this->validate($validation)){
									return redirect()->to(base_url('dashboard/blog/posts/'.$id))
											->withInput()->with('error', $this->validator);
								}
								$miniatura = $this->request->getPost('video_miniatura');
							}elseif($tipo == "imagen") {
								$validation = [
									'miniatura' =>  [
										'rules' => 'is_image[miniatura]',
										'errors' => [
											'is_image' => 'El campo Imagen de Miniatura no es válido'
										]
									]
								];
								
								if(!$this->validate($validation)){
									return redirect()->to(base_url('dashboard/blog/posts/'.$id))
											->withInput()->with('error', $this->validator);
								}
								$miniatura = $this->request->getFile('miniatura');
								
								
								if($miniatura->isValid()){
									$nuevoNombre = $miniatura->getRandomName();
									$miniatura->move(ROOTPATH."public/images/blog", $nuevoNombre);
									$nurl = 'images/blog/'.$nuevoNombre;
									$miniatura = $nurl;
								}
							}
						} else {
							if($tipo == "video"){
								$mini = $this->request->getPost('video_miniatura');
								if ($mini) {
									$validation = [
										'video_miniatura' =>  [
											'rules' => 'required|valid_url',
											'errors' => [
												'valid_url' => 'El campo Video de miniatura no contiene una URL válida'
											]
										]
									];
				
									if(!$this->validate($validation)){
										return redirect()->to(base_url('dashboard/blog/posts/'.$id))
												->withInput()->with('error', $this->validator);
									}
									$miniatura = $mini;
								}
							}elseif($tipo == "imagen") {
								$mini = $this->request->getFile('miniatura');
								if ($mini->isValid()) {
									$validation = [
										'miniatura' =>  [
											'rules' => 'is_image[miniatura]',
											'errors' => [
												'is_image' => 'El campo Imagen de Miniatura no es válido'
											]
										]
									];
									
									if(!$this->validate($validation)){
										return redirect()->to(base_url('dashboard/blog/posts/'.$id))
												->withInput()->with('error', $this->validator);
									}
									if ($old->tipo == "imagen" && $old->miniatura) {
										unlink($old->miniatura);
									}

									if($mini->isValid()){
										$nuevoNombre = $mini->getRandomName();
										$mini->move(ROOTPATH."public/images/blog", $nuevoNombre);
										$nurl = 'images/blog/'.$nuevoNombre;
										$miniatura = $nurl;
									}
								}
							}
						}
					}else {
						if ($old->miniatura == "" || $old->miniatura == NULL) {
							if($tipo == "video"){
								$miniatura = $this->request->getPost('video_miniatura');
							}elseif($tipo == "imagen") {
								$mini = $this->request->getFile('miniatura');
			
								if($mini->isValid()){
									if ($old->tipo == "imagen" && isset($old->miniatura)) {
										unlink($old->miniatura);
									}
	
									$nuevoNombre = $mini->getRandomName();
									$mini->move(ROOTPATH."public/images/blog", $nuevoNombre);
									$nurl = 'images/blog/'.$nuevoNombre;
									$miniatura = $nurl;
								}
							}
						}else {
							if($tipo == "video"){
								if ($this->request->getPost('video_miniatura') !== NULL) {
									$miniatura = $this->request->getPost('video_miniatura');
								}
							}elseif($tipo == "imagen") {
								if ($this->request->getFile('miniatura') !== NULl) {
									$miniatura = $this->request->getFile('miniatura');
			
									if($miniatura->isValid()){
										if ($old->tipo == "imagen" && isset($old->miniatura)) {
											unlink($old->miniatura);
										}
		
										$nuevoNombre = $miniatura->getRandomName();
										$miniatura->move(ROOTPATH."public/images/blog", $nuevoNombre);
										$nurl = 'images/blog/'.$nuevoNombre;
										$miniatura = $nurl;
									}
								}
							}
						}
					}
					//var_dump($data);

					if ($miniatura) {
						$data = [
							'name' => $name,
							'slug' => $slug,
							'status' => $status,
							'extract' => $extract,
							'body' => $body,
							'tipo' => $tipo,
							'miniatura' => $miniatura,
							'category_id' => $category,
							'user_id' => $this->session->id
						];
					}else {
						$data = [
							'name' => $name,
							'slug' => $slug,
							'status' => $status,
							'extract' => $extract,
							'body' => $body,
							'tipo' => $tipo,
							'category_id' => $category,
							'user_id' => $this->session->id
						];
					}

					//var_dump($data);
				
					$this->postmodel->update($id, $data);

					$tags = $this->request->getPost('tags');
					$this->poststagsmodel->where('post_id', $id)->delete();
					if(isset($tags)){
						foreach ($tags as $tag) {
							$data = [
								'post_id' => $id,
								'tag_id' => $tag
							];
							$this->poststagsmodel->insert($data);
						}
					}
				}

				$this->session->setflashdata('success','El Post se ha actualizado correctamente.');
				return redirect()->to(base_url().'/dashboard/blog/posts');
			}else {
				return redirect()->to(base_url().'/login');
			}
		}
		return redirect()->to(base_url().'/dashboard/blog/posts/create');
	}

	public function destroy($id){
		if($this->request->getMethod() == 'post'){
			if(isset($this->session->id)){
				$this->postmodel->delete($id);
				$this->poststagsmodel->where('post_id', $id)->delete();
				$this->session->setflashdata('warning','El Post se ha eliminado correctamente.');
				return redirect()->to(base_url().'/dashboard/blog/posts');
			}
		}
	}
}