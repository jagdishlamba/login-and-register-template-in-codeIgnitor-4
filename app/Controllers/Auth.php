<?php
namespace App\Controllers;
use App\Models\UsersModel;
use App\Models\QuestionModel;
use App\Models\UserTypeModel;
use CodeIgniter\Controller;
use App\Libraries\Hash;
use App\Models\UserActivityModel;

class Auth extends BaseController
{
	public function __construct(){
		helper(['url','form']);
	}

	public function agent()
	{
		$agent = $this->request->getUserAgent();

		if ($agent->isBrowser())
		{
		    $browser = $agent->getBrowser().' '.$agent->getVersion();
			$platform = $agent->getPlatform();
			$ip = $_SERVER['REMOTE_ADDR'];
			$loginTime = date('d-m-y H:i:s');
			$sessionId  = session_id();
		}
		
		else
		{
		    $browser = "not pc";
			$platform = "not pc";
			$ip = $_SERVER['REMOTE_ADDR'];
			$loginTime = date('d-m-Y H:i:s');
			$sessionId  = session()->get(session_id());
		}
		 $activity = [$browser,$platform,$ip,$loginTime,$sessionId];
		return $activity;
	}

	public function login()
	{
		return view('login/login');

	}

	public function login_check()
	{
		$validation =  \Config\Services::validation();
		$validation = $this->validate([
			'name'=>[
				'rules'=> 'required|is_not_unique[user.name]',
				'errors'=>[
					'required' => 'User Name is required',
					'is_not_unique' => 'User Name is not registered with us.'
				]
			],

			'password'=>[
				'rules'=>'required',
				'errors'=>[
					'required' => 'Password is required',
				]
			]
		]);

		if(!$validation) {
			return view('login/login',['validation'=>$this->validator]);
		}
		else {

			$name = $this->request->getPost('name');
			$password = $this->request->getPost('password');
			$model = new UsersModel();
			$user_info = $model->where('name',$name)->first();
			$check_password = Hash::check($password,$user_info['password']);

			if (!$check_password) {
				session()->setFlashdata('fail', 'Incorrect Password');
				return redirect()->to('login')->withInput();
				}

			else{
				$user_id = $user_info['id'];
				session()->set('loggedUser',$user_id);
				$info = $this->agent();
				$data = ['userId'=>$user_id,
						'ip' => $info[2],
						'browser' =>$info[0],
						'os' => $info[1],
						'loginTime' => $info[3],
						'sessionId' =>$info[4],
						'status' => 1];
				$activity = new UserActivityModel();
				$activity->insert($data);

				if($user_info['priority'] == 1) {
					return redirect()->to('/admin');
				}

				elseif ($user_info['priority'] == 2 ) {
					return redirect()->to('/user');
				}

				else 
				{
					return redirect()->to('/guest');
				}
				
			}
		}
	}
	
	public function logout()
	{
		if(session()->has('loggedUser')){

			$userId = session()->get('loggedUser');
			$db      = \Config\Database::connect();
			$query = $db->query("SELECT id from useractivity where (userId = '$userId' and logoutTime ='0000-00-00 00:00:00')");
			$results = $query->getResultArray();
			$userId = session()->get('loggedUser');
			$data =  ['logoutTime'=>date('d-m-y H:i:s'),
					  'status' => 0];
			$activity = new UserActivityModel();
			$activity->update($results[0]['id'],$data);
			session()->remove('loggedUser');
			return redirect()->to('login?access=out')->with('success','You are logged out!');
		}
	}


	public function register()
	{

		$model = new QuestionModel();
		$data['table'] = $model->findAll();

		$model1 = new UserTypeModel();
		$data['usertype'] = $model1->findAll();
		return view('login/register', $data);
	}

	public function save()
	{
		
		$validation =  \Config\Services::validation();
		$validation = $this->validate([
			'name'=>[
				'rules'=> 'required|is_unique[user.name]',
				'errors'=>[
					'required' => 'User Name is required',
					'is_unique' => 'User Name is already used'
				]
			],

			'password'=>[
				'rules'=>'required|min_length[8]',
				'errors'=>[
					'required' => 'Password is required',
					'min_length' => 'Minimum length of password is 8'
				]
			],

			'cpassword'=>[
				'rules'=>'required|min_length[8]|matches[password]',
				'errors'=>[
					'required' => 'Confirm Password is required',
					'min_length' => 'Minimum length of password is 8',
					'matches' => 'Confirm Password does not match with Password'
				]
			],

			's_answer'=>[
				'rules'=>'required',
				'errors'=>[
					'required' => 'Security Answer is required',
				]
			],
		]);

		if(!$validation) {

			$model = new QuestionModel();
			$data['table'] = $model->findAll();

			$model1 = new UserTypeModel();
			$data['usertype'] = $model1->findAll();

			$data['validation'] = $this->validator;
			return view('login/register',$data);
		}
		else {

			$name = $this->request->getPost('name');
			$password = $this->request->getPost('password');
			$priority = $this->request->getPost('priority');
			$s_question = $this->request->getPost('s_question');
			$s_answer = $this->request->getPost('s_answer');

			$data = ['name'=>$name,
					'password'=>Hash::make($password),
					'priority'=>$priority,
					's_question'=>$s_question,
					's_answer'=>$s_answer];
			$model = new UsersModel();
			$query = $model->insert($data);
			if (!$query) {
				return redirect()->back()->with('fail','Something went wrong');
			}
			else {
				return redirect()->to('register')->with('success','You are successfully registered');
			}
		}
	}

	public function changePassword()
	{
		$model = new QuestionModel();
		$data['table'] = $model->findAll();
		return view('login/changePassword', $data);
	}

	public function checkPassword()
	{
		$validation =  \Config\Services::validation();
		$validation = $this->validate([
			'name'=>[
				'rules'=> 'required|is_not_unique[user.name]',
				'errors'=>[
					'required' => 'User Name is required',
					'is_not_unique' => 'User Name is not registered with us.'
				]
			],

			's_answer'=>[
				'rules'=>'required',
				'errors'=>[
					'required' => 'Security Answer is required',
				]
			],
		]);

		if(!$validation) {

			$model = new QuestionModel();
			$data['table'] = $model->findAll();

			$data['validation'] = $this->validator;
			return view('login/changePassword',$data);
		}
		else {

			$name = $this->request->getPost('name');
			$s_question = $this->request->getPost('s_question');
			$s_answer = $this->request->getPost('s_answer');

			$model = new UsersModel();
			$query = $model->where('name',$name)->first();
			if (!$query) {
				return redirect()->back()->with('fail','Something went wrong');
			}
			else {

				if($query['s_question'] != $s_question || $query['s_answer'] != $s_answer) {
					return redirect()->back()->with('fail','Security Question/Answer does not match.');
				}

				else {
					$data['table'] =$query;
					return view('login/newPassword',$data);				
				}
			}
		}
	}

	public function updatePassword()
	{
		$id = $this->request->getPost('id');
		$password = $this->request->getPost('password');

		print_r($id,$password);
		$model = new UsersModel();
			
		$validation =  \Config\Services::validation();
		$validation = $this->validate([
			
			'password'=>[
				'rules'=>'required|min_length[8]',
				'errors'=>[
					'required' => 'Password is required',
					'min_length' => 'Minimum length of password is 8',
				]
			],

			'cpassword'=>[
				'rules'=>'required|min_length[8]|matches[password]',
				'errors'=>[
					'required' => 'Confirm Password is required',
					'min_length' => 'Minimum length of password is 8',
					'matches' => 'Confirm Password does not match with Password',
				]
			],
		]);

		if(!$validation) {

			$query = $model->where('id',$id)->first();
			$data['table'] = $query;

			$data['validation'] = $this->validator;
			return view('login/newPassword',$data);
		}
		else {
				
			$data = ['password'=>Hash::make($password)];
			$query = $model->update($id,$data);
			
			if (!$query) {
				return redirect()->back()->with('fail','Something went wrong!');
			}
			else {
				return redirect()->to('login')->with('success','Password changed successfully!');
			}
		}
	}

	
}
?>