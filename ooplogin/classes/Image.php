<?php 

require_once 'core/init.php';


class Image {

	private $_imageName='';


	public function __construct($image = [])
	{
		$this->_db = DB::getInstance();
	}

	public function uploadImage($image, $path = null) 
	{
		$this->setImageName($image);
		move_uploaded_file($image['tmp_name'], $path . $this->getImageName());
	return;
	}

	public function getImageName()
	{		
		return $this->_imageName;		
	}

	private function setImageName($image)
	{	
		date_default_timezone_set('Asia/Kathmandu');	
		$this->_imageName = date('Ymdhis',time()).$image['name'];
		
	}

	public function updateImage($image, $path = null)
	{
		$user = new User();
		$currentImage = $user->data()->image;
		$newImage 	  = $image['name'];
		if($newImage) {
			$newImage = $newImage;
			$this->setImageName($image);
			$this->deleteImage("$path/$currentImage");
			
		} else {
			$newImage = $currentImage;
			$this->_imageName = $currentImage;
		}

		move_uploaded_file($image['tmp_name'], $path . $this->getImageName());
	}

	public function deleteImage($path = null)
	{
		unlink($path);
	}



}



?>