<?php 



class Admin   {

	private $_db,
			$_data,
			$_sessionName;
						

	public function __construct()
	{
		
		$this->_db = DB::getInstance();
		$this->_sessionName = Config::get('session/session_name');

		if(Session::exists($this->_sessionName)) {
			$this->_sessionName = Session::get($this->_sessionName);
		}

	}

	public function viewProfiles() 
	{
		$sql = "SELECT * FROM users INNER JOIN departments ON users.dpt_id = departments.id";
		$data = $this->_db->query($sql);
		if($data->count()) {
			$this->_data = $data->results();

			return true;
		}

		return false;
	}





	public function data()
	{
		return $this->_data;
	}



}



?>