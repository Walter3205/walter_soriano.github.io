<?php 
namespace App\Controllers;

use App\Models\PostsModel;
use App\Models\CategoriesModel;
use App\Models\CustomModel;
use App\Models\UsersModel;
use App\Models\TagsModel;
use App\Models\PostsTagsModel;

class Tags extends BaseController
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
		$this->session = session();
		helper(['form','url']);
	}

	public function loadViews($view=null, $data=null){
		echo view("Admin/layout/head");
		echo view("Admin/layout/header",  $data);
		echo view("Admin/".$view, $data);
		//echo view("Admin/layout/footer");
	}

	public function index(){
		$data['segment'] =  $this->request->uri->getSegment(3);
	
		$email = $this->session->email;
        if (!$email) {
            return redirect()->to(base_url().'/login');
        } else {
			$data['user'] =  $this->usermodel->where('email', $email)
				  ->first();
			$data['tags'] = $this->tagsmodel->findAll();
			$data['success'] = $this->session->getFlashdata('success');
			$data['warning'] = $this->session->getFlashdata('warning');
			$data['t_error'] = $this->session->getFlashdata('t_error');
			$this->loadViews('tags/index', $data);
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
			$this->loadViews('tags/create', $data);
        }
	}

	public function store(){
		if ($this->request->getMethod() == 'post') {
			$validation = [
					'name' => [
                        'rules' => 'required|is_unique[tags.name]',
                        'errors' => [
                            'is_unique' => 'Ya se encuentra una etiqueta con este nombre'
                        ]
                    ],
                    'slug'   =>  [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'El campo Slug es requerido'
                        ]
                    ]
            ];

			if(!$this->validate($validation)){
                return redirect()->to(base_url('dashboard/blog/tags/create'))
                        ->withInput()->with('error', $this->validator);
			}
			
			if(isset($this->session->id)){
				$name = $this->request->getPost('name');
				$slug = $this->request->getPost('slug');
				
				$data = [
                    'name' => $name,
                    'slug' => $slug
                ];
            
				$this->tagsmodel->insert($data);

				$this->session->setflashdata('success','La etiqueta se ha creado correctamente.');
				return redirect()->to(base_url('dashboard/blog/tags'));
			}else {
				return redirect()->to(base_url().'/login');
			}
		}
		return redirect()->to(base_url().'/dashboard/blog/tags/create');
	}

    public function edit($id = false){
		$data['segment'] =  $this->request->uri->getSegment(3);
		
		$email = $this->session->email;
        if (!$email) {
            return redirect()->to(base_url().'/login');
        } else {
			$data['tag'] = $this->tagsmodel->find($id);
			if(!isset($data['tag'])){
				return redirect()->to(base_url().'/dashboard/blog/tags');
			}
			$data['user'] =  $this->usermodel->where('email', $email)
				  ->first();
            if($this->session->has('error')){
                $data['error'] = $this->session->error;
            }		
			$this->loadViews('tags/edit', $data);
        }
	}

    public function update($id){
		if ($this->request->getMethod() == 'post') {
			$validation = [
                'name' => [
                    'rules' => 'required|is_unique[tags.name,id,'.$id.']',
                    'errors' => [
                        'is_unique' => 'Ya se encuentra una etiqueta con este nombre'
                    ]
                ],
                'slug'   =>  [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo URL es requerido'
                    ]
                ]
            ];
            
            if(!$this->validate($validation)){
                return redirect()->to(base_url('dashboard/blog/tags/'.$id))
                        ->withInput()->with('error', $this->validator);
            }else{
				if(isset($this->session->id)){
					$old = $this->tagsmodel->find($id);
					if(isset($old)){
						$name = $this->request->getPost('name');
                        $slug = $this->request->getPost('slug');
	
						$data = [
                            'name' => $name,
                            'slug' => $slug
                        ];

						$this->tagsmodel->update($id, $data);
					}
				}else{
					return redirect()->to(base_url().'/login');
				}
				$this->session->setflashdata('success','La etiqueta se ha actualizado correctamente.');
				return redirect()->to(base_url().'/dashboard/blog/tags');
			}
		}else {
			return redirect()->to(base_url().'/dashboard/blog/tags/'.$id);
		}
	}

    public function destroy($id){
		if($this->request->getMethod() == 'post'){
			if(isset($this->session->id)){
				$old = $this->poststagsmodel->where('tag_id', $id)->first();
				if(isset($old)){
					$this->session->setflashdata('t_error','La etiqueta no se puede eliminar, está asociada a un Post.');
					return redirect()->to(base_url().'/dashboard/blog/tags');
				}else{
					$this->tagsmodel->delete($id);
					$this->session->setflashdata('warning','La etiqueta se ha eliminado correctamente.');
					return redirect()->to(base_url().'/dashboard/blog/tags');
				}
			}
		}
	}
}