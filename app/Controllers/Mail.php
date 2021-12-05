<?php 
namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\CustomModel;
use App\Models\ContactModel;

class Mail extends BaseController
{
	public function __construct()
    {
		$db = db_connect();
		helper(["form","url"]);
		$this->usermodel = new UsersModel();
		$this->custommodel = new CustomModel($db);
		$this->contactmodel = new ContactModel();
	}
	
	public function loadViews($view=null, $data=null){
		echo view("Admin/layout/head");
		echo view("Admin/layout/header", $data);
		echo view("Admin/".$view, $data);
		//echo view("Admin/layout/footer");
	}

    public function SaveMessage()
	{	
		if ($this->request->getVar('contactName')) {
			helper(['form', 'url']);
			
			$data = [
				'name' => $this->request->getVar('contactName'),
				'email'  => $this->request->getVar('contactEmail'),
				'subject' => $this->request->getVar('contactSubject'),
				'message'  => $this->request->getVar('contactMessage'),
				'readed' =>	'F'
			];
	 
			$this->contactmodel->insert($data);
		}
	}

	public function mail($id)
	{
		helper(['form', 'url']);
		$session = session();
		$data['segment'] =  $this->request->uri->getSegment(1);
		$data['user'] =  $this->usermodel->where('email', $session->email)
			->first();
		$data['mail'] = $this->contactmodel->find($id);
		$data['prev'] = $this->custommodel->getPrevMail($id, $data['mail']->created_at);
		$data['next'] = $this->custommodel->getNextMail($id, $data['mail']->created_at);
		if(session()->has('error')){
			$data['error'] = session('error');
		}		
		$this->loadViews('mail/show', $data);
	}

}