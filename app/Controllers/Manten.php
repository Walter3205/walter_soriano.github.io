<?php namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\MantenModel;
use App\Models\ClientesModel;


class Manten extends BaseController
{
	public function __construct()
    {
		helper(['form','url']);
		$this->usermodel = new UsersModel();
		$this->mantenmodel = new MantenModel();
		$this->clientemodel = new ClientesModel();
		$this->config    = new \Config\Encryption();     // load the configuration for the encryption service
		$this->session = session();
	}

	public function loadViews($view=null, $data=null){
		echo view("Admin/layout/head");
		echo view("Admin/layout/header",  $data);
		echo view("Admin/".$view, $data);
		//echo view("Admin/layout/footer");
	}
	
	public function mantenimiento(){
		$data['segment'] =  $this->request->uri->getSegment(3);
		
		$email = $this->session->email;
       
		$data['user'] =  $this->usermodel->where('email', $email)
			->first();
		$data['manten'] = $this->mantenmodel->findAll();
		if($this->session->has('error')){
			$data['error'] = $this->session->error;
		}
		if($this->session->has('msg')){
			$data['msg'] = $this->session->msg;
		}			
		$this->loadViews('mantenimientos/mantenimiento', $data);
	}

	public function background(){
		if ($this->request->getMethod() == 'post') {
			$validation = [
				'id'	=>	[
					'rules'	=>	'required',
					'errors'	=>	[
						'required' => 'El campo id es requerido, favor no modificarlo'
					]
				],
				'imagen' => [
					'rules' => 'is_image[imagen]',
					'errors' => [
						'is_image'	=> 'La imagen de Fondo no es una imagen válida'
					]
				],
			];

			if(!$this->validate($validation)){
				return redirect()->to(base_url().'/dashboard/mantenimientos/mantenimiento')
						->withInput()->with('error', $this->validator);
			}
			
			$back = $this->request->getFile('imagen');
			$id = $this->request->getPost('id');

			if ($back->isValid()) {
				$old = $this->mantenmodel->find($id);
				unlink($old->image);
				
				$nuevoNombre = $back->getRandomName();
				$back->move(ROOTPATH."public/images", $nuevoNombre);
				$url = 'images/'.$nuevoNombre;
				$data = [
					'id'	=>	$id,
					'image' => $url
				];
			}	

			$this->mantenmodel->save($data);
			return redirect()->to(base_url().'/dashboard/mantenimientos/mantenimiento')
							->with('msg', 'Se ha modificado la imagen de Fondo de la página');
		}else {
			return redirect()->to(base_url().'/dashboard/mantenimientos/mantenimiento');
		}
	}

	public function welcome(){
		if ($this->request->getMethod() == 'post') {
			$validation = [
				'text' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'El campo Mensaje de Bienvenida es requerido'
					]
				],
				'id'	=>	[
					'rules'	=>	'required',
					'errors'	=>	[
						'required' => 'El campo id es requerido, favor no modificarlo'
					]
				]
			];

			if(!$this->validate($validation)){
				return redirect()->to(base_url().'/dashboard/mantenimientos/mantenimiento')
						->withInput()->with('error', $this->validator);
			}

			$id = $this->request->getPost('id');
			$text = $this->request->getPost('text');

			$data = [
				'id'	=>	$id,
				'text' => $text,
			];

			$this->mantenmodel->save($data);
			return redirect()->to(base_url().'/dashboard/mantenimientos/mantenimiento')
						->with('msg', 'Se ha modificado el Mensaje de Bienvenida de la página');				
		}
		return redirect()->to(base_url().'/dashboard/mantenimientos/mantenimiento');
	}

	public function logo(){
		if ($this->request->getMethod() == 'post') {
			$validation = [
				'imagen_logo' => [
					'rules' => 'is_image[imagen_logo]',
					'errors' => [
						'is_image'	=> 'No es una imagen válida'
					]
				],
				'id'	=>	[
					'rules'	=>	'required',
					'errors'	=>	[
						'required' => 'El campo id es requerido, favor no modificarlo'
					]
				]
			];

			if(!$this->validate($validation)){
				return redirect()->to(base_url().'/dashboard/mantenimientos/mantenimiento')
						->withInput()->with('error', $this->validator);
			}
			
			$back = $this->request->getFile('imagen_logo');
			$id = $this->request->getPost('id');

			if ($back->isValid()) {
				$old = $this->mantenmodel->find($id);
				unlink($old->image);
				
				$nuevoNombre = $back->getRandomName();
				$back->move(ROOTPATH."public/images", $nuevoNombre);
				$url = 'images/'.$nuevoNombre;
				$data = [
					'id'	=>	$id,
					'image' => $url
				];
			}	

			$this->mantenmodel->save($data);
			return redirect()->to(base_url().'/dashboard/mantenimientos/mantenimiento')
						->with('msg', 'Se ha modificado el Logo de la página');
		}else {
			return redirect()->to(base_url().'/dashboard/mantenimientos/mantenimiento');
		}
	}
}
