<?php namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ClientesModel;


class Clientes extends BaseController
{
	public function __construct()
    {
		helper(['form','url']);
		$this->usermodel = new UsersModel();
		$this->clientemodel = new ClientesModel();
		$this->session = session();
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
			$data['clientes'] = $this->clientemodel->findAll();
			$data['success'] = $this->session->getFlashdata('success');
			$data['warning'] = $this->session->getFlashdata('warning');
			$data['t_error'] = $this->session->getFlashdata('t_error');		
			$this->loadViews('mantenimientos/clientes/clientes', $data);
        }
	}

	public function create(){
		$data['segment'] =  $this->request->uri->getSegment(3);
		
		$email = $this->session->email;
        if (!$email) {
            return redirect()->to(base_url().'/login');
        } else {
			$data['user'] =  $this->usermodel->where('email', $email)
				  ->first();
			if($this->session->has('error')){
				$data['error'] = $this->session->error;
			}		
			$this->loadViews('mantenimientos/clientes/create_cliente', $data);
        }
	}

	public function store(){
		if ($this->request->getMethod() == 'post') {
			$validation = [
				'name' => [
					'rules' => 'required|is_unique[clientes.name]',
					'errors' => [
						'required' => 'El campo Nombre es requerido'
					]
				],
				'imagen'	=>	[
					'rules'	=> 	'is_image[imagen]',
					'errors'	=>	[
						'is_image'	=>	'No es una imagen válida'
					]
				]
			];

			if(!$this->validate($validation)){
				return redirect()->to(base_url().'/dashboard/mantenimientos/clientes/create')
						->withInput()->with('error', $this->validator);
			}
		    
			if(isset($this->session->id)){
				//$id = $this->request->getPost('id');
				$name = $this->request->getPost('name');
				$file = $this->request->getFile('imagen');
				$url = $this->request->getPost('url');

				if (isset($url)) {
					$data['cliente_url'] = $url;
				}

				$data['name'] = $name;

				if($file->isValid()){		
					$nuevoNombre = $file->getRandomName();
					$file->move(ROOTPATH."public/images/clients", $nuevoNombre);
					$nurl = 'images/clients/'.$nuevoNombre;
					$data['image'] = $nurl;
				}
				
				$this->clientemodel->insert($data);
				
				$this->session->setflashdata('success','El Cliente se ha creado correctamente.');
				return redirect()->to(base_url().'/dashboard/mantenimientos/clientes');
			}else {
				return redirect()->to(base_url().'/login');
			}
		}
		return redirect()->to(base_url().'/dashboard/mantenimientos/clientes/create');
	}

	public function edit($id = false){
		$data['segment'] =  $this->request->uri->getSegment(3);
		
		$email = $this->session->email;
        if (!$email) {
            return redirect()->to(base_url().'/login');
        } else {
			$data['cliente'] = $this->clientemodel->find($id);
			if(!isset($data['cliente'])){
				return redirect()->to(base_url().'/dashboard/mantenimientos/clientes');
			}
			$data['user'] =  $this->usermodel->where('email', $email)
				  ->first();
			if($this->session->has('error')){
				$data['error'] = $this->session->error;
			}		
			$this->loadViews('mantenimientos/clientes/ver_cliente', $data);
        }
	}

	public function update($id){
		if ($this->request->getMethod() == 'post') {
			
			if($this->request->getFile('imagen')  == null){
				if(isset($this->session->id)){
					$validation = [
						'name' => [
							'rules' => 'required|is_unique[clientes.name,id,'.$id.']',
							'errors' => [
								'required' => 'El campo Nombre es requerido'
							]
						]
					];

					if(!$this->validate($validation)){
						return redirect()->to(base_url().'/dashboard/mantenimientos/clientes/'.$id)
								->withInput()->with('error', $this->validator);
					}
					
					$old = $this->clientemodel->find($id);
					if(isset($old)){
						$name = $this->request->getPost('name');
						//$file = $this->request->getFile('imagen');
						$url = $this->request->getPost('url');

						if (isset($url)) {
							$data['cliente_url'] = $url;
						}
	
						$data['name'] = $name;

						$this->clientemodel->update($id, $data);
					}
					$this->session->setflashdata('success','El Cliente se ha actualizado correctamente.');
					return redirect()->to(base_url().'/dashboard/mantenimientos/clientes');
				}else{
					return redirect()->to(base_url().'/login');
				}
			}
			else {	
				$validation = [
					'name' => [
						'rules' => 'required|is_unique[clientes.name,id,'.$id.']',
						'errors' => [
							'required' => 'El campo Nombre es requerido'
						]
					],
					'imagen'	=>	[
						'rules' => 'is_image[imagen]',
						'errors'	=>	[
							'is_image'	=>	'No es una imagen válida'
						]
					]
				];
				
				if(!$this->validate($validation)){
					return redirect()->to(base_url().'/dashboard/mantenimientos/clientes/'.$id)
							->withInput()->with('error', $this->validator);
				}
				
				$session = session();
				if(isset($session->id)){
					//$id = $this->request->getPost('id');
					$name = $this->request->getPost('name');
					$file = $this->request->getFile('imagen');
					$url = $this->request->getPost('url');

					if (isset($url)) {
						$data['cliente_url'] = $url;
					}

					$data['name'] = $name;

					$old = $this->clientemodel->find($id);
					if(isset($old)){
						if($file->isValid()){
							unlink($old->image);
							
							$nuevoNombre = $file->getRandomName();
							$file->move(ROOTPATH."public/images/clients", $nuevoNombre);
							$nurl = 'images/clients/'.$nuevoNombre;
							$data['image'] = $nurl;
						}
						$this->clientemodel->update($id, $data);
					}
					$this->session->setflashdata('success','El Cliente se ha actualizado correctamente.');
					return redirect()->to(base_url().'/dashboard/mantenimientos/clientes');
				}else {
					return redirect()->to(base_url().'/login');
				}
			}
		}else {
			return redirect()->to(base_url().'/dashboard/mantenimientos/clientes/'.$id);
		}
	}

	public function destroy($id){
		if($this->request->getMethod() == 'post'){
			if(isset($this->session->id)){
				$this->clientemodel->delete($id);
				$this->session->setflashdata('warning','El cliente se ha eliminado correctamente.');
				return redirect()->to(base_url().'/dashboard/mantenimientos/clientes');
			}
		}
	}
}