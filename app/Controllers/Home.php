<?php
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Models\ContactModel;

class Home extends BaseController
{
	public function index()
	{
		return view('index');
	}
}
