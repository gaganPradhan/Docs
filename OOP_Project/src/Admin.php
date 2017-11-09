<?php 

namespace UserInterface;

class Admin extends User {
protected $userid;

public function __construct(User $name){
  	$this-> username = $name-> username;
 	self::makeAdmin();
   }

protected function makeAdmin(){
	$response = $this-> getAdminStatus($this-> username);
}
 
public function updateProfile($updatedName, $updatedEmail, $image){
	$user = $this-> setUserUpdates($this-> userid, $updatedName, $updatedEmail, $image);
	header('Location: viewUserList.php');
	if($this-> username == $this-> userid){
		$_SESSION["username"] = $this-> username;
	}
}
public function selectUser($username){
	$this-> userid = $username;
}

public function showUserList(){
	$userList = $this-> getUserList();
	return $userList;
}
public function viewUserProfile(){
	$user = $this-> getUserInfo($this-> userid);
	return $user;	
}
public function flipPower(){
	$response = $this-> flipAdminStatus($this-> userid);
}
public function deleteUserProfile(){
		$response = $this-> deleteProfile($this-> userid);		
}

}

