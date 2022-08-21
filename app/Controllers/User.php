<?php
namespace App\Controllers;
use CodeIgniter\Controller;


class User extends BaseController
{
	public function index()
	{
		if (!session()->get('loggedUser')) {
			return redirect()->to('/auth/login')->with('fail','You are not authorised');;
		}
		else{
		return view('user/user_dashboard');
		}
	}
}