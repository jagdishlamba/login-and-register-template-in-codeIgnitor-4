<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ContactModel;
use App\Models\UsersModel;



class Admin extends BaseController
{
	public function index()
	{
		if (!session()->get('loggedUser')) {
			return redirect()->to('/auth/login')->with('fail','You must be logged in!');;
		}
		else{
			$data['title'] = 'Dashboard';

			$user_id = session()->get('loggedUser');
			$user = new UsersModel();
			$data['user'] = $user->where('id',$user_id)->first();
			
			$model = new ContactModel();
			$data['contact'] = $model->findAll();
			return view('admin/admin_dashboard', $data);
		}
	}
}