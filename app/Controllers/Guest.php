<?php
namespace App\Controllers;
use CodeIgniter\Controller;


class Guest extends BaseController
{
	public function index()
	{
		if (!session()->get('loggedUser')) {
			return redirect()->to('/auth/login')->with('fail','You are not authorised');;
		}
		else{
			return view('guest/guest_dashboard');
		}
	}
}