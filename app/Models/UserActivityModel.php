<?php namespace App\Models;
use CodeIgniter\Model;

class UserActivityModel extends Model
{
	protected $table = 'useractivity';
	protected $primaryKey = 'id';
	protected $allowedFields = ['userId', 'ip', 'browser','os','loginTime','logoutTime','sessionId','status'];
}

?>