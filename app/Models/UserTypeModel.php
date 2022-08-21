<?php namespace App\Models;
use CodeIgniter\Model;

class UserTypeModel extends Model
{
	protected $table = 'user_type';
	protected $primaryKey = 'id';
	protected $allowedFields = ['user_type'];
}

?>