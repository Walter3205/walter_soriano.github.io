<?php namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\TrabajosModel;

class Trabajos extends BaseController
{
	public function __construct()
    {
		$this->usermodel = new UsersModel();
        $this->trabajomodel = new TrabajosModel();
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
			$data['trabajos'] = $this->trabajomodel->findAll();
            $data['success'] = $this->session->getFlashdata('success');
			$data['warning'] = $this->session->getFlashdata('warning');
			$this->loadViews('mantenimientos/trabajos/index', $data);
        }
	}

    public function edit($id = false){
		$data['segment'] =  $this->request->uri->getSegment(3);
		
		$email = $this->session->email;
        if (!$email) {
            return redirect()->to(base_url().'/login');
        } else {
			$data['trabajo'] = $this->trabajomodel->find($id);
			if(!isset($data['trabajo'])){
				return redirect()->to(base_url().'/dashboard/mantenimientos/trabajos_recientes');
			}
			$data['user'] =  $this->usermodel->where('email', $email)
				  ->first();
            if($this->session->has('error')){
                $data['error'] = $this->session->error;
            }		
			$this->loadViews('mantenimientos/trabajos/edit', $data);
        }
	}

    public function update($id){
		if ($this->request->getMethod() == 'post') {
			$validation = [
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo Nombre es requerido'
                    ]
                ],
                'url'   =>  [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo URL es requerido'
                    ]
                ],
                'categoria' =>  [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo Categoria es requerido'
                    ]
                ],
                'descripcion'   =>  [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo Descripcion es requerido'
                    ]
                ]
            ];
            
            if(!$this->validate($validation)){
                return redirect()->to(base_url('dashboard/mantenimientos/trabajos_recientes/'.$id))
                        ->withInput()->with('error', $this->validator);
            }else{
				$session = session();
				if(isset($session->id)){
					$old = $this->trabajomodel->find($id);
					if(isset($old)){
						$name = $this->request->getPost('name');
                        $url = $this->request->getPost('url');
                        $categoria = $this->request->getPost('categoria');
                        $descripcion = $this->request->getPost('descripcion');
						$image = $this->request->getFile('imagen');
                        $image600 = $this->request->getFile('imagen600');
                        $image1200 = $this->request->getFile('imagen1200');
	
						$data = [
                            'name' => $name,
                            'url' => $url,
                            'categoria' => $categoria,
                            'descripcion' => $descripcion
                        ];

                        if($this->request->getFile('imagen') !== null){
                            if($image->isValid()){
                                unlink($old->image);
                                
                                $nuevoNombre = $image->getRandomName();
                                $image->move(ROOTPATH."public/images/portfolio/gallery", $nuevoNombre);
                                $nurl = 'images/portfolio/gallery/'.$nuevoNombre;
                                $data['image'] = $nurl;
                            }
                        }

                        if($this->request->getFile('imagen600') !== null){
                            if($image600->isValid()){
                                unlink($old->image600);
                                
                                $nuevoNombre = $image600->getRandomName();
                                $image600->move(ROOTPATH."public/images/portfolio", $nuevoNombre);
                                $nurl = 'images/portfolio/'.$nuevoNombre;
                                $data['image600'] = $nurl;
                            }
                        }

                        if($this->request->getFile('imagen1200') !== null){
                            if($image1200->isValid()){
                                unlink($old->image1200);
                                
                                $nuevoNombre = $image1200->getRandomName();
                                $image1200->move(ROOTPATH."public/images/portfolio", $nuevoNombre);
                                $nurl = 'images/portfolio/'.$nuevoNombre;
                                $data['image1200'] = $nurl;
                            }
                        }

						$this->trabajomodel->update($id, $data);

                        $this->session->setflashdata('success','El trabajo se ha creado correctamente.');
                        return redirect()->to(base_url().'/dashboard/mantenimientos/trabajos_recientes/'.$id);
					}
				}else{
					return redirect()->to(base_url().'/login');
				}
			}
		}else {
			return redirect()->to(base_url().'/dashboard/mantenimientos/trabajos_recientes/'.$id);
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
			$this->loadViews('mantenimientos/trabajos/create', $data);
        }
	}

    public function store(){
		if ($this->request->getMethod() == 'post') {
			$validation = [
					'name' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'El campo Nombre es requerido'
                        ]
                    ],
                    'url'   =>  [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'El campo URL es requerido'
                        ]
                    ],
                    'categoria' =>  [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'El campo Categoria es requerido'
                        ]
                    ],
                    'descripcion'   =>  [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'El campo Descripcion es requerido'
                        ]
                    ],
					'imagen' => [
                        'rules' => 'is_image[imagen]',
                        'errors' => [
                            'is_image' => 'Imagen Original No es una imagen valida'
                        ]
                    ],
                    'imagen600' => [
                        'rules' => 'is_image[imagen600]',
                        'errors' => [
                            'is_image' => 'Imagen 600px No es una imagen valida'
                        ]
                    ],
                    'imagen1200' => [
                        'rules' => 'is_image[imagen1200]',
                        'errors' => [
                            'is_image' => 'Imagen 1200px No es una imagen valida'
                        ]
                    ]
            ];

			if(!$this->validate($validation)){
                return redirect()->to(base_url('dashboard/mantenimientos/trabajos_recientes/create'))
                        ->withInput()->with('error', $this->validator);
			}
			
			if(isset($this->session->id)){
				//$id = $this->request->getPost('id');
				$name = $this->request->getPost('name');
				$image = $this->request->getFile('imagen');
                $image600 = $this->request->getFile('imagen600');
                $image1200 = $this->request->getFile('imagen1200');
				$url = $this->request->getPost('url');
                $categoria = $this->request->getPost('categoria');
                $descripcion = $this->request->getPost('descripcion');

				$data = [
                    'name' => $name,
                    'url' => $url,
                    'categoria' => $categoria,
                    'descripcion' => $descripcion
                ];

                if($image->isValid()){
                    $nuevoNombre = $image->getRandomName();
                    $image->move(ROOTPATH."public/images/portfolio/gallery", $nuevoNombre);
                    $nurl = 'images/portfolio/gallery/'.$nuevoNombre;
                    $data['image'] = $nurl;
                }
            
                if($image600->isValid()){
                    $nuevoNombre = $image600->getRandomName();
                    $image600->move(ROOTPATH."public/images/portfolio", $nuevoNombre);
                    $nurl = 'images/portfolio/'.$nuevoNombre;
                    $data['image600'] = $nurl;
                }
            
                if($image1200->isValid()){
                    $nuevoNombre = $image1200->getRandomName();
                    $image1200->move(ROOTPATH."public/images/portfolio", $nuevoNombre);
                    $nurl = 'images/portfolio/'.$nuevoNombre;
                    $data['image1200'] = $nurl;
                }
            
				$this->trabajomodel->insert($data);

				$this->session->setflashdata('success','El trabajo se ha actualizado correctamente.');
				return redirect()->to(base_url().'/dashboard/mantenimientos/trabajos_recientes');
			}else {
				return redirect()->to(base_url().'/login');
			}
		}
		return redirect()->to(base_url().'/dashboard/mantenimientos/trabajos_recientes/create');
	}

    public function destroy($id){
		if($this->request->getMethod() == 'post'){
			if(isset($this->session->id)){
				$this->trabajomodel->delete($id);
				$this->session->setflashdata('warning','El trabajo se ha eliminado correctamente.');
                return redirect()->to(base_url().'/dashboard/mantenimientos/trabajos_recientes');
			}
		}
	}
}