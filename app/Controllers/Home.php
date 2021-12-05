<?php namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\MantenModel;
use App\Models\ClientesModel;
use App\Models\TrabajosModel;
use App\Models\ContactModel;
use App\Models\CustomModel;

class Home extends BaseController
{
	public function __construct()
    {
		$db = db_connect();
		$this->usermodel = new UsersModel();
		$this->mantenmodel = new MantenModel();
		$this->clientemodel = new ClientesModel();
		$this->trabajomodel = new TrabajosModel();
		$this->contactmodel = new ContactModel();
		$this->custommodel = new CustomModel($db);
	}
	
	public function index()
	{
		$len = $this->request->getLocale();
		$seg = $this->request->uri->getSegment(1);
		$uri = $this->request->getServer('SCRIPT_URI');
		if ($uri == 'https://dymstudio.dev/') {
			return redirect()->to(base_url());
		}
		$data['manten'] = $this->mantenmodel->findAll();
		$data['clientes'] = $this->clientemodel->findAll();
		$data['trabajos'] = $this->trabajomodel->findAll();
		if ($seg == '') {
			if ($len == 'en') {
				$this->request->setLocale('es');
			}
			return view('index', $data);
		}else {
			if ($len == 'es') {
				$this->request->setLocale('en');
			}
			return view('en/index', $data);
		}
	}

	public function dashboard(){
		$email = session('email');
		$data['segment'] =  $this->request->uri->getSegment(1);
        if (!$email) {
            return redirect()->to(base_url().'/login');
        } else {
			
			$data['user'] =  $this->usermodel->where('email', $email)
                  ->first();
			//$data['mails'] = $this->custommodel->getMails();

			$data['mails'] = $this->contactmodel->orderBy('created_at', 'DESC')->paginate(5);
			$data['pager'] = $this->contactmodel->pager;
		
			//$db = \Config\Database::connect();

			//$data['conteomail'] = $db->table('contacts')->selectCount('*')->where('readed', 'F')->countAllResults();

			return view('Admin/dashboard', $data);
			//$this->loadViews("dashboard");
        }
	}

}
