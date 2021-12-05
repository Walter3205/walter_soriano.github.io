<?php 
namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\RolesModel;
use App\Models\CustomModel;
use App\Models\MantenModel;

class Users extends BaseController
{
	public function __construct()
    {
		$db = db_connect();
		helper(["form","url"]);
		$this->usermodel = new UsersModel();
		$this->rolemodel = new RolesModel();
		$this->custommodel = new CustomModel($db);
		$this->mantenmodel = new MantenModel();
		$this->config    = new \Config\Encryption();     // load the configuration for the encryption service
  		$this->encrypter = \Config\Services::encrypter($this->config ); // start the encryption service
		$this->session = session();
	}
	
	public function loadViews($view=null, $data=null){
		echo view("Admin/layout/head");
		echo view("Admin/layout/header", $data);
		echo view("Admin/".$view, $data);
		//echo view("Admin/layout/footer");
	}

	public function login(){
		$data[] = '';
		if (isset($this->session->email)) {
			return redirect()->to(base_url().'/dashboard');
		}
		if($this->session->has('error')){
			$data['error'] = session('error');
		}
		if(session()->has('email')){
			$data['mail'] = session('email');
		}
		if(session()->has('pass')){
			$data['pass'] = session('pass');
		}
		if(session()->has('msg')){
			$data['msg'] = session('msg');
		}
		return view('Admin/login', $data);
	}

	public function logout(){
		$this->session->destroy();
        return redirect()->to(base_url().'/login');
    }

	public function create_user(){
		$user = $this->usermodel->where("email", "walter123asg@gmail.com")->first();
		if($user){
			return redirect()->to(base_url().'/login');
		}else{
			
			$this->usermodel->insert([
				"firstname" => "Walter",
				"lastname" => "Soriano",
				"email" => "walter123asg@gmail.com",
				"password" => base64_encode($this->encrypter->encrypt("123")),
				"image"	=> "images/avatars/1613845835_0555aecfd4dd550d62cb.jpg",
				"role_id" => "1",	
			]);

			/*$encrypter = \Config\Services::encrypter();
			$data = 'joe.doe@example.com';
			$enc = $encrypter->encrypt($data);

			$encrypter = \Config\Services::encrypter();
			$result = $encrypter->decrypt($enc);

			$encoded = base64_encode($encrypter->encrypt($data));

			$decoded = $encrypter->decrypt(base64_decode($encoded));
			
			echo $encoded;
			echo "<br>";
			echo $decoded;*/
			
			return redirect()->to(base_url().'/login');
		}
	}

	public function postlogin(){
		if (!$this->request->getMethod() == 'post') {
			return redirect()->to(base_url().'/login');
		}

		$validation = [
			'email' => [
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'El campo Correo es requerido',
					'valid_email' => 'No es una dirección de correo válida'
				]
			],
			'password'   =>  [
				'rules' => 'required',
				'errors' => [
					'required' => 'El campo Contraseña es requerido'
				]
			]
		];

		if(!$this->validate($validation)){
			return redirect()->to(base_url().'/login')->withInput()
					->with('error', $this->validator);
		}

		$email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

		$user = $this->usermodel->where('email', $email)->first();
		if ($user){
			$pass = $user->password;
			$result = $this->encrypter->decrypt(base64_decode($pass));
			if ($password == $result) {
				$level = 'admin';
                $levelmatch = $user->role_id;
                switch ($levelmatch) {
                    case '1':
                        $setData = [
                            'email' => $email,
							'header' => 'Admin',
							'id' => $user->id
                        ];
                        $this->session->set($setData);
                        return redirect()->to(base_url().'/dashboard');
                        break;
                    case '3':
                        $setData = [
                            'email' => $email,
							'header' => 'Bloger',
							'id' => $user->id
                        ];
                        $this->session->set($setData);
                        return redirect()->to(base_url().'/dashboard');
                        break;
                }
			} else {
				return redirect()->to(base_url().'/login')->withInput()
							->with('pass', 'La contraseña es incorrecta');
			}
		} else {
			return redirect()->to(base_url().'/login')->withInput()
						->with('mail', 'El Email es incorrecto');
		}
		return redirect()->to(base_url().'/login');
	}

	public function profile(){		
		$data['segment'] = '';
		$id = $this->session->id;
        if (!$id) {
            return redirect()->to(base_url().'/login');
        } else {
			$email = $this->session->email;
			$data['user'] =  $this->usermodel->where('email', $email)
				  ->first();
				  
			$data['roles'] = $this->rolemodel->findAll();
			if($this->session->has('error')){
				$data['error'] = $this->session->error;
			}
			$data['success'] = $this->session->getFlashdata('success');	
			return view('Admin/profile', $data);
        }
	}

	public function postprofile(){		
		if ($this->request->getMethod() == 'post') {
			$id = $this->request->getPost('id');
			if ($id != $this->session->id) {
				$this->session->destroy();
				return redirect()->to(base_url().'/login');
			} else {
				$password = $this->request->getPost('password');
				if($password !== ""){
					$validation = [
						'firstname' => [
							'rules' => 'required|alpha_space',
							'errors' => [
								'required' => 'El campo Nombre es requerido',
								'alpha_space'	=>	'El campo Nombre sólo debe contener letras'
							]
						],
						'lastname'   =>  [
							'rules' => 'required|alpha_space',
							'errors' => [
								'required' => 'El campo Apellido es requerido',
								'alpha_space'	=>	'El campo Apellido sólo debe contener letras'
							]
						],
						'password'   =>  [
							'rules' => 'required',
							'errors' => [
								'required' => 'El campo Contraseña es requerido'
							]
						],
						'passconf'   =>  [
							'rules' => 'required|matches[password]',
							'errors' => [
								'required' => 'El campo Confirmar Contraseña es requerido',
								'matches' => 'Las contraseñas no coinciden'
							]
						],
						'email'   =>  [
							'rules' => 'required|valid_email|is_unique[users.email,id,{id}]',
							'errors' => [
								'required' => 'El campo Confirmar Contraseña es requerido',
								'valid_email' => 'No es una direccion de correo válida',
								'is_unique'	=> 'Este correo ya se encuntra registrado'
							]
						]
					];
					
					if (!$this->validate($validation)){
						return redirect()->to(base_url().'/dashboard/profile')->withInput()
								->with('error', $this->validator);
					}else{
						
						$firstname = $this->request->getPost('firstname');
						$lastname = $this->request->getPost('lastname');
						$email = $this->request->getPost('email');
						$password = base64_encode($this->encrypter->encrypt($password));
						$file = $this->request->getFile('imagen');

						$data = [
							'id'       => $id,
							'firstname' => $firstname,
							'lastname'    => $lastname,
							'email' 	=> $email,
							'password'	=> $password,
						];

						if($file->isValid()){
							$old = $this->usermodel->find($id);
							unlink($old->image);
							
							$nuevoNombre = $file->getRandomName();
							$file->move(ROOTPATH."public/images/avatars", $nuevoNombre);
							$url = 'images/avatars/'.$nuevoNombre;
							$data['image'] = $url;
						}
					}
				}else {
					$validation = [
						'firstname' => [
							'rules' => 'required|alpha_space',
							'errors' => [
								'required' => 'El campo Nombre es requerido',
								'alpha_space'	=>	'El campo Nombre sólo debe contener letras'
							]
						],
						'lastname'   =>  [
							'rules' => 'required|alpha_space',
							'errors' => [
								'required' => 'El campo Apellido es requerido',
								'alpha_space'	=>	'El campo Apellido sólo debe contener letras'
							]
						],
						'email'   =>  [
							'rules' => 'required|valid_email|is_unique[users.email,id,{id}]',
							'errors' => [
								'required' => 'El campo Confirmar Contraseña es requerido',
								'valid_email' => 'No es una direccion de correo válida',
								'is_unique'	=> 'Este correo ya se encuntra registrado'
							]
						]
					];

					if (!$this->validate($validation)){
						return redirect()->to(base_url().'/dashboard/profile')->withInput()
								->with('error', $this->validator);
					}else {
						$firstname = $this->request->getPost('firstname');
						$lastname = $this->request->getPost('lastname');
						$email = $this->request->getPost('email');

						$file = $this->request->getFile('imagen');

						$data = [
							'id'       => $id,
							'firstname' => $firstname,
							'lastname'    => $lastname,
							'email' 	=> $email,
						];

						if($file->isValid()){
							$old = $this->usermodel->find($id);
							unlink($old->image);

							$nuevoNombre = $file->getRandomName();
							$file->move(ROOTPATH."public/images/avatars", $nuevoNombre);
							$url = 'images/avatars/'.$nuevoNombre;
							$data['image'] = $url;
						}
					}
				}
				$this->usermodel->save($data);
				$this->actualizarsession($email);
				$this->session->setflashdata('success','El perfil se ha actualizado correctamente.');
				return redirect()->to(base_url().'/dashboard/profile');
				//print_r($data);
			}
		}
		return redirect()->to(base_url().'/dashboard/profile');
	}

	public function actualizarsession($email){
		$user = $this->usermodel->where('email', $email)->first();
		$rol = $this->rolemodel->where('id',  $user->role_id)->first();
		$setData = [
			'email' => $email,
			'header' => $rol->name
		];
		$this->session->set($setData);
	}

	public function forgot_password(){
		$id = $this->session->id;
		$data[] = '';
                if($id){
			return redirect()->to(base_url().'/dashboard');	
		}
		if($this->session->has('error')){
			$data['error'] = $this->session->error;
		}
		return view('Admin/forgot_password/forgot_password', $data);
	}

	public function postforgot(){
		if($this->request->getMethod() == 'post'){
			$correo = $this->request->getPost('email');
			$bemail = $this->usermodel->where('email', $correo)
						->first();
			if (!$bemail) {
				return redirect()->to(base_url().'/forgot-password')->withInput()
						->with('error', 'El Correo ingresado no se encontró');
			} else {
				$name = trim(stripslashes($bemail->firstname. ' '.$bemail->lastname));
				
				try{
				
					$email = \Config\Services::email();

					$email->setFrom('info@dymstudio.dev', 'dymstudio');
					//$email->setTo($bemail->emial);
					$email->setTo($correo);
					//$email->setCC('another@another-example.com');
					//$email->setBCC('them@their-example.com');

					$email->setSubject('Correo de Recupereación de Contraseña');

					$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
					$password = array(); 
					$alpha_length = strlen($alphabet) - 1; 
					for ($i = 0; $i < 8; $i++) 
					{
						$n = rand(0, $alpha_length);
						$password[] = $alphabet[$n];
					}
					$npass = implode($password);

					$email->setMessage($name . ' Su nueva contraseña es : ' . $npass);

					if ($email->send()) {
						$data['password'] = base64_encode($this->encrypter->encrypt($npass));
					
						$this->usermodel->update($bemail->id, $data);	
						return redirect()->to(base_url().'/login')
						->with('msg', 'Se envió un mensaje con su nueva contraseña favor revise su correo');
					} else {
						echo $email->printDebugger(['header']);
					}
				}catch(\Exception $e){
					die($e->getMessage());	
				}
			}
		}
	}

	public function users(){
		$data['segment'] =  $this->request->uri->getSegment(2);
		$data['user'] =  $this->usermodel->where('email', session('email'))
			->first();
		//$data['roles'] = $this->rolemodel->findAll();
		$data['users'] = $this->custommodel->getUsers(session(('id')));
		if($this->session->has('error')){
			$data['error'] = $this->session->error;
		}
		$data['success'] = $this->session->getFlashdata('success');
		$data['warning'] = $this->session->getFlashdata('warning');
		$data['t_error'] = $this->session->getFlashdata('t_error');
		echo $this->loadViews('users/users', $data);
	}

	public function userscreate(){
		$data['segment'] =  $this->request->uri->getSegment(2);
        
		$data['user'] =  $this->usermodel->where('email', $this->session->email)
			->first();
		$data['roles'] = $this->rolemodel->findAll();
		if($this->session->has('error')){
			$data['error'] = $this->session->error;
		}
		echo $this->loadViews('users/create', $data);
	}

	public function usersstore(){
		$this->verificarLog();

		if ($this->request->getMethod() == 'post') {
			$validation = [
				'firstname' => [
					'rules' => 'required|alpha_space',
					'errors' => [
						'required' => 'El campo Nombre es requerido',
						'alpha_space'	=>	'El campo Nombre sólo debe contener letras'
					]
				],
				'lastname'   =>  [
					'rules' => 'required|alpha_space',
					'errors' => [
						'required' => 'El campo Apellido es requerido',
						'alpha_space'	=>	'El campo Apellido sólo debe contener letras'
					]
				],
				'email'   =>  [
					'rules' => 'required|valid_email|is_unique[users.email,id,{id}]',
					'errors' => [
						'required' => 'El campo Email es requerido',
						'valid_email' => 'No es una direccion de correo válida',
						'is_unique'	=> 'Este correo ya se encuntra registrado'
					]
				],
				'password'   =>  [
					'rules' => 'required',
					'errors' => [
						'required' => 'El campo Contraseña es requerido'
					]
				],
				'passconf'   =>  [
					'rules' => 'required|matches[password]',
					'errors' => [
						'required' => 'El campo Confirmar Contraseña es requerido',
						'matches' => 'Las contraseñas no coinciden'
					]
				]
			];
			
			if (!$this->validate($validation)) {
				return redirect()->to(base_url().'/dashboard/users/create')->withInput()
						->with('error', $this->validator);
			} else {
				if(isset($this->session->id)){
					$firstname = $this->request->getPost('firstname');
					$lastname = $this->request->getPost('lastname');
					$email = $this->request->getPost('email');
					$password = $this->request->getPost('password');
					$password = base64_encode($this->encrypter->encrypt($password));
					$role = $this->request->getPost('roles');
					//$passconf = $this->request->getPost('passconf');
					
					$file = $this->request->getFile('imagen');

					$data = [
						'firstname' => $firstname,
						'lastname'    => $lastname,
						'email' 	=> $email,
						'password'	=> $password,
						'role_id'	=> $role,
					];

					if($file->isValid()){
						$nuevoNombre = $file->getRandomName();
						$file->move(ROOTPATH."public/images/avatars", $nuevoNombre);
						$url = 'images/avatars/'.$nuevoNombre;
						$data['image'] = $url;
					}

					$this->usermodel->insert($data);

					$this->session->setflashdata('success','El usuario ha sido creado satisfactoriamente.');
					return redirect()->to(base_url().'/dashboard/users');
				}else {
					return redirect()->to(base_url().'/login');
				}
			}
		}else {
			return redirect()->to(base_url().'/dashboard/users/create');
		}
	}

	public function usersedit($id){
		$this->verificarLog();
		$usr = $this->usermodel->find($id);
		$role = $this->rolemodel->find($usr->role_id);
		if (!$this->session) {
			return redirect()->to(base_url().'/login');
		}
		if ($this->session->id == $usr->id) {
			return redirect()->to(base_url().'/dashboard/profile');	
		}
		if ($role->name !== "Bloger") {
			//$session->destroy();
			return redirect()->to(base_url().'/dashboard/users');
		}
		$data['segment'] =  $this->request->uri->getSegment(2);
		$data['usr'] = $this->usermodel->find($id);
		
		if(!isset($data['usr'])){
			return redirect()->to(base_url().'/dashboard/users');
		}
		$data['user'] =  $this->usermodel->where('email', $this->session->email)
			->first();
		$data['roles'] = $this->rolemodel->findAll();
		if($this->session->has('error')){
			$data['error'] = $this->session->error;
		}		
		$this->loadViews('users/edit', $data);
	}

	public function usersupdate($id){
		$this->verificarLog();
		if ($this->request->getMethod() == 'post') {
			$role = $this->rolemodel->find($this->request->getPost('role_id'));
			if ($role->name !== "Bloger") {
				$this->session->destroy();
				return redirect()->to(base_url().'/login');
			} else {
				$password = $this->request->getPost('password');
				if($password !== ""){
					$validation = [
						'firstname' => [
							'rules' => 'required|alpha_space',
							'errors' => [
								'required' => 'El campo Nombre es requerido',
								'alpha_space'	=>	'El campo Nombre sólo debe contener letras'
							]
						],
						'lastname'   =>  [
							'rules' => 'required|alpha_space',
							'errors' => [
								'required' => 'El campo Apellido es requerido',
								'alpha_space'	=>	'El campo Apellido sólo debe contener letras'
							]
						],
						'password'   =>  [
							'rules' => 'required',
							'errors' => [
								'required' => 'El campo Contraseña es requerido'
							]
						],
						'passconf'   =>  [
							'rules' => 'required|matches[password]',
							'errors' => [
								'required' => 'El campo Confirmar Contraseña es requerido',
								'matches' => 'Las contraseñas no coinciden'
							]
						],
						'email'   =>  [
							'rules' => 'required|valid_email|is_unique[users.email,id,{id}]',
							'errors' => [
								'required' => 'El campo Confirmar Contraseña es requerido',
								'valid_email' => 'No es una direccion de correo válida',
								'is_unique'	=> 'Este correo ya se encuntra registrado'
							]
						]
					];
					
					if (!$this->validate($validation)){
						return redirect()->to(base_url().'/dashboard/users/'.$id)->withInput()
								->with('error', $this->validator);
					}else{
						
						$firstname = $this->request->getPost('firstname');
						$lastname = $this->request->getPost('lastname');
						$email = $this->request->getPost('email');
						$password = base64_encode($this->encrypter->encrypt($password));
						$file = $this->request->getFile('imagen');

						$data = [
							'id'       => $id,
							'firstname' => $firstname,
							'lastname'    => $lastname,
							'email' 	=> $email,
							'password'	=> $password,
						];

						if($file->isValid()){
							$old = $this->usermodel->find($id);
							unlink($old->image);
							
							$nuevoNombre = $file->getRandomName();
							$file->move(ROOTPATH."public/images/avatars", $nuevoNombre);
							$url = 'images/avatars/'.$nuevoNombre;
							$data['image'] = $url;
						}
					}
				}else {
					$validation = [
						'firstname' => [
							'rules' => 'required|alpha_space',
							'errors' => [
								'required' => 'El campo Nombre es requerido',
								'alpha_space'	=>	'El campo Nombre sólo debe contener letras'
							]
						],
						'lastname'   =>  [
							'rules' => 'required|alpha_space',
							'errors' => [
								'required' => 'El campo Apellido es requerido',
								'alpha_space'	=>	'El campo Apellido sólo debe contener letras'
							]
						],
						'email'   =>  [
							'rules' => 'required|valid_email|is_unique[users.email,id,{id}]',
							'errors' => [
								'required' => 'El campo Confirmar Contraseña es requerido',
								'valid_email' => 'No es una direccion de correo válida',
								'is_unique'	=> 'Este correo ya se encuntra registrado'
							]
						]
					];

					if (!$this->validate($validation)){
						return redirect()->to(base_url().'/dashboard/users/'.$id)->withInput()
								->with('error', $this->validator);
					}else {
						$firstname = $this->request->getPost('firstname');
						$lastname = $this->request->getPost('lastname');
						$email = $this->request->getPost('email');

						$file = $this->request->getFile('imagen');

						$data = [
							'id'       => $id,
							'firstname' => $firstname,
							'lastname'    => $lastname,
							'email' 	=> $email,
						];

						if($file->isValid()){
							$old = $this->usermodel->find($id);
							unlink($old->image);

							$nuevoNombre = $file->getRandomName();
							$file->move(ROOTPATH."public/images/avatars", $nuevoNombre);
							$url = 'images/avatars/'.$nuevoNombre;
							$data['image'] = $url;
						}
					}
				}
				$this->usermodel->save($data);
				//$this->actualizarsession($email);
				$this->session->setflashdata('success','El usuario ha sido actulizado correctamente.');
				return redirect()->to(base_url().'/dashboard/users');
				//print_r($data);
			}
		}
		return redirect()->to(base_url().'/dashboard/users');
	}

	public function usersdestroy($id){
		if($this->request->getMethod() == 'post'){
			$this->verificarLog();
			if(isset($this->session->id)){
				if($id == $this->session->id){
					$this->session->setflashdata('t_error','No puede eliminar este usuario.');
					return redirect()->to(base_url().'/dashboard/users');
				}else {
					$usr = $this->usermodel->find($id);
					if (isset($usr)) {
						if ($usr->role_id == 1) {
							$this->session->setflashdata('t_error','No puede eliminar este usuario.');
							return redirect()->to(base_url().'/dashboard/users');
						}else {
							$this->usermodel->delete($id);
							$this->session->setflashdata('warning','El usuario ha sido elimando correctamente.');
							return redirect()->to(base_url().'/dashboard/users');
						}
					}else {
						$this->session->setflashdata('t_error','No se encontró el usuario.');
						return redirect()->to(base_url().'/dashboard/users');
					}
				}
			}
		}
		return redirect()->to(base_url().'/dashboard/users');
	}

	public function verificarLog(){
		if ($this->session->email == null) {
			return redirect()->to(base_url().'/login');
		}
		elseif ($this->session->header == 'Bloger') {
			return redirect()->to(base_url().'/dashboard');
		}
	}

}
