<?php 
namespace App\Controllers;
use CodeIgniter\Controller;

use App\Models\PostsModel;
use App\Models\CategoriesModel;
use App\Models\CustomModel;
use App\Models\MantenModel;
use App\Models\UsersModel;

class Categories extends BaseController
{
    public function __construct()
    {
		$db = db_connect();
		$this->usermodel = new UsersModel();
		$this->postmodel = new PostsModel();
		$this->custommodel = new CustomModel($db);
		$this->categorymodel = new CategoriesModel();
		$this->mantenmodel = new MantenModel();
		$this->session = session();
		helper(['form', 'url']);
	}

	public function loadViews($view=null, $data=null){
		helper(['form','url']);
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
			$data['categories'] = $this->categorymodel->findAll();
			$data['success'] = $this->session->getFlashdata('success');
			$data['warning'] = $this->session->getFlashdata('warning');
			$data['t_error'] = $this->session->getFlashdata('t_error');	
			$this->loadViews('categories/index', $data);
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
			$this->loadViews('categories/create', $data);
        }
	}

	public function store(){
		if ($this->request->getMethod() == 'post') {
			$validation = [
					'name' => [
                        'rules' => 'required|is_unique[categories.name]',
                        'errors' => [
                            'is_unique' => 'Ya se encuentra una categoría con este nombre'
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
                return redirect()->to(base_url('dashboard/blog/categories/create'))
                        ->withInput()->with('error', $this->validator);
			}
			
			if(isset($this->session->id)){
				$name = $this->request->getPost('name');
				$slug = $this->request->getPost('slug');
				
				$data = [
                    'name' => $name,
                    'slug' => $slug
                ];
            
				$this->categorymodel->insert($data);
				
				$this->session->setflashdata('success','La categoría se ha creado correctamente.');
				return redirect()->to(base_url().'/dashboard/blog/categories');
			}else {
				return redirect()->to(base_url().'/login');
			}
		}
		return redirect()->to(base_url().'/dashboard/blog/categories/create');
	}

    public function edit($id = false){
		$data['segment'] =  $this->request->uri->getSegment(3);
		
		$email = $this->session->email;
        if (!$email) {
            return redirect()->to(base_url().'/login');
        } else {
			$data['category'] = $this->categorymodel->find($id);
			if(!isset($data['category'])){
				return redirect()->to(base_url().'/dashboard/blog/categories');
			}
			$data['user'] =  $this->usermodel->where('email', $email)
				  ->first();
            if($this->session->has('error')){
                $data['error'] = $this->session->error;
            }		
			$this->loadViews('categories/edit', $data);
        }
	}

    public function update($id){
		if ($this->request->getMethod() == 'post') {
			$validation = [
                'name' => [
                    'rules' => 'required|is_unique[categories.name,id,'.$id.']',
                    'errors' => [
                        'required' => 'El campo Nombre es requerido'
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
                return redirect()->to(base_url('dashboard/blog/categories/'.$id))
                        ->withInput()->with('error', $this->validator);
            }else{
				if(isset($this->session->id)){
					$old = $this->categorymodel->find($id);
					if(isset($old)){
						$name = $this->request->getPost('name');
                        $slug = $this->request->getPost('slug');
	
						$data = [
                            'name' => $name,
                            'slug' => $slug
                        ];

						$this->categorymodel->update($id, $data);
					}
				}else{
					return redirect()->to(base_url().'/login');
				}
				$this->session->setflashdata('success','La categoría se ha actualizado correctamente.');
				return redirect()->to(base_url().'/dashboard/blog/categories');
			}
		}else {
			return redirect()->to(base_url().'/dashboard/blog/categories/'.$id);
		}
	}

    public function destroy($id)
	{
		if($this->request->getMethod() == 'post'){
			if(isset($this->session->id)){
				$old = $this->postmodel->where('category_id', $id)->first();
				if (isset($old)) {
					$this->session->setflashdata('t_error','La categoría no se puede eliminar, está asociada a un Post.');
					return redirect()->to(base_url().'/dashboard/blog/categories');
				}else {
					$this->categorymodel->delete($id);
					$this->session->setflashdata('warning','La categoría se ha eliminado correctamente.');
					return redirect()->to(base_url().'/dashboard/blog/categories');
				}
			}
		}
	}
}