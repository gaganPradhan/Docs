<?php

namespace UserInterface;


interface AllUserFeatures {
	public function userLogin();
	/*
	*
	* Every user account must have an login feature
	*
	*/
	public function userLogout();
	/*
	*
	* Every user account must have an logout feature
	*
	*/
}	

class User extends Authentication implements AllUserFeatures{
	protected $password, $username, $email, $image, $id;

	public function __construct($username, $password = null, $email = null, $image = null){
		/*
		*
		* When user info is stored
		*
		*/
		$this-> username = $username;
		$this-> password = $password;
		$this-> email 	= $email;
		$this-> image 	= $image;
		}

	public function userCreate(){
		$response = $this-> createUserAccount($this-> username, $this-> password, $this-> email, $this-> image);		
		if($response){
			self::userLogin();
		}else{		
			header('Location: redirect.php');
		}
	}

	public function userLogin() {
		$response = $this-> getUserAuthentication($this-> username, $this-> password);	
		if($response){
			session_start();
			$_SESSION["username"] = $this -> username;
			return 1;
		}	else{
			return 0;	 
		}
	}

	public function userLogout() {
		session_destroy();
	}

	public function viewUserProfile(){	
		$user = $this-> getUserInfo($this-> username);
		return $user;		
	}

	public function updateProfile($updatedName, $updatedEmail, $image){
		$user = $this-> setUserUpdates($this-> username, $updatedName, $updatedEmail, $image);
		$_SESSION["username"] = $updatedName;
		header('Location: viewUserProfile.php');
	}

	public function isUserAdmin(){
		$response = $this-> getUserStatus($this-> username);
		if($response){
			return 1;
		}else{
			return 0;
		}
	}
	public function deleteUserProfile(){
		$response = $this-> deleteProfile($this-> username);
		self::userLogout();		
	}

	

}

?>