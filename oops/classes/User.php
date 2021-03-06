<?php 

class User {
	private $_db,
			$_data,
			$_department,
			$_sessionName,
			$_cookieName,
			$_isLoggedIn;


	public function __construct($user = null)
	{
		$this->_db = DB::getInstance();

		$this->_sessionName = Config::get('session/session_name');

		if(!$user) {
			if(Session::exists($this->_sessionName)) {
				$user = Session::get($this->_sessionName);

				if($this->find($user)) {
					$this->_isLoggedIn = true;
				} else {
					$this->logout();
				}
			}

		} else {
			$this->find($user);
		}
	}
	


	public function createUser($fields = []) 
	{
		if(!$this->_db->insert('users', $fields)) {

			throw new Exception('There was a Problem creating an account.');
		}
	}


	public function find($user = null)
	{
		if($user) {
			$field = (is_numeric($user)) ? 'id' :'username';
			$data = $this->_db->get('users', [$field, '=', $user]);

			if($data->count()) {
				$this->_data = $data->first();
				return true;
			}
 		}
 		return false;
	}




	public function login($username = null, $password = null)
	{

		if(!$username && !$password && $this->exists()) {
			Session::put($this->_sessionName, $this->data()->id);
		} else {
			$user = $this->find($username);
			if($user) {
				if($this->data()->password === Hash::make($password, $this->data()->salt)) {
					Session::put($this->_sessionName, $this->data()->id);

					return true;
				}
			}
		}
		return false;
	}



	public function updateAccount($fields = [], $id = null)
	{
		if(!$id && $this->isLoggedIn()) {
			$id = $this->data()->id;
		}

		if(!$this->_db->update('users', $id, $fields)) {
			throw new Exception('There was a problem updating');
		}
	}


	public function deleteAccount($id = null)
	{
		if(!$id && $this->isLoggedIn()) {
			$id = $this->data()->id;
		}
		if(!$this->_db->delete('users', ['id', '=', $id])){
			throw new Exception('There was a problem deleting the account');
		} else {
			Session::delete($this->_sessionName);
		}
	}



	public function hasPermission($key)
	{
		$group = $this->_db->get('groups',['id', '=', $this->data()->groups]);
		// print_r($group->first());
		if($group->count()) {
			$permissions = json_decode($group->first()->permissions, true);
			if($permissions[$key] == true) {
				return true;
			}
		}

		return false;
	}


	public function exists()
	{
		return (!empty($this->_data)) ? true : false;
	}

	public function logout()
	{
		Session::delete($this->_sessionName);
	}

	
	public function data()
	{
		return $this->_data;
	}

	public function department()
	{
		return $this->_department;
	}


	public function isLoggedIn() 
	{
		return $this->_isLoggedIn;
	}


	
}


?>