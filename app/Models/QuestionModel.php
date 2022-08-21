<?php namespace App\Models;
use CodeIgniter\Model;

class QuestionModel extends Model
{
	protected $table = 's_question';
	protected $primaryKey = 'id';
	protected $allowedFields = ['question'];
}

?>