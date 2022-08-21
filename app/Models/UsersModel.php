<?php namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model
{
	protected $table = 'user';
	protected $primaryKey = 'id';
	protected $allowedFields = ['name', 'password','cpassword','s_question','s_answer','priority'];
}

?>