<?php 

namespace UserInterface;

use mysqli;



class Authentication extends DatabaseConnection{

		protected function createUserAccount($username, $password, $email, $image){
			    $insert = "INSERT INTO user(Username, Password, Email, Image) 			
				VALUES('$username', '$password', '$email', '$image')";
				$result = $this-> initiateQuery($insert);
				return $result;
		}

		protected function getUserList(){
			$select = "SELECT * FROM user";
			$result = $this-> initiateQuery($select);
			$numberRows	= $result-> num_rows;
			if($numberRows > 0){
				while($row  = $result-> fetch_assoc()){
					$data[] = $row; 
				}
				return $data;
			}
			return 0;
		}

		protected function getUserAuthentication($username,$password){
			/*
			*
			*Validate User
			*
			*/			
			$select = "SELECT Username, Password FROM user";
			$result = $this-> initiateQuery($select);
			while($row = $result->fetch_assoc() ){
				if(strcasecmp($row["Username"], $username) == 0 & $row["Password"] == $password){
					return 1;
				}
			}	
			return 0;
		}

		protected function getUserInfo($username){
			$select = "SELECT * FROM user WHERE Username = '$username'";
			$result = $this-> initiateQuery($select);
			$row    = $result-> fetch_assoc();
			return $row;
		}

		protected function getAdminStatus($username){
			$update = "UPDATE user SET AccountType = 1 WHERE Username = '$username'";
			$result = $this-> initiateQuery($update);
		}
		
		protected function setUserUpdates($username, $updatedname, $updatedemail, $updatedimage){
			$update = "UPDATE user SET Username = '$updatedname', Email = '$updatedemail', Image = '$updatedimage' WHERE Username = '$username'";
			$result = $this-> initiateQuery($update);
		}

		protected function getUserStatus($username){
			$select = "SELECT AccountType FROM user WHERE Username = '$username'"; 
			$result = $this-> initiateQuery($select);
			$row    = $result-> fetch_assoc();
			if($row["AccountType"] == 1){
				return 1;
			} else{
				return 0;
			}	
		}
		
		protected function deleteProfile($username){
			$delete = "DELETE FROM user WHERE Username = '$username'";
			$response = $this-> initiateQuery($delete);
		}

		protected function flipAdminStatus($username){
			$update = "UPDATE user SET AccountType = !AccountType WHERE Username = '$username'";
			$result = $this-> initiateQuery($update);
		}

}

