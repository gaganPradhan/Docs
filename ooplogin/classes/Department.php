<?php

class Department {
    
    private $_db,
			$_data,
			$_department,
			$_sessionName,
			$_isLoggedIn;


	public function __construct($user = null){
		$this->_db = DB::getInstance();
		$this->_sessionName = Config::get('session/session_name');		
	}
    
    public function getDepartment($where = []){ 
    
       	$data = $this->_db->get('departments', $where); 
		if($data->count()) {     
            if(empty($where)){
                $this->_data = $data->results();
                return true;
            }else{
                $this->_data = $data->first();  
                return true;
            }
        }
		return false;
	}
    
    public function data() {
        return $this->_data;
    }

    
    }