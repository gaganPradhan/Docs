<?php 
require_once 'core/init.php';
require_once 'includes/header.php';


$user = new User();

if(!$user->isLoggedIn()) {
	 Session::flash('home', 'Please LogIn first!!');
	 Redirect::to('index.php');
}

if(Input::exists()) {
	if(Token::checkToken(Input::get('token'))) {

		$validate = new Validation();
		$imageValidate = new Validation();
		$validation = $validate->check($_POST, [
					'username' => [
							'required' => true,
							'min' => 2,
							'max' => 20,
							'unique' => 'users'
							
							],

					'name' => [
							  'required' => true,
					   		  'min' => 2,
					   		  'max' =>50,
					   		  'nameType'=> '/^[a-zA-Z\s]+$/'
					   		  ]
					   ]);

		$imageValidation = $imageValidate->check($_FILES, [
							'image' => [
								'imageType' => [
										"image/png", 
										"image/jpg", 
										"image/jpeg",
										""
										],
								'imageSize' => 1*1024*1024		
							]
							]);

		if($validation->passed() && $imageValidation->passed()) {
			
			$image = new Image();

			try {
				$image->updateImage(Input::get('image'),  './images/');
				$user->updateAccount([
						'username' => Input::get('username'),
						'name'	   => Input::get('name'),
						'image'    => $image->getImageName()

						]);
				Session::flash('home', 'Your details have been updated');
				Redirect::to('index.php');

			} catch(Exception $e) {
				die($e->getMessage());
			}

		} else {
			foreach ($validation->errors() as $error) {
				echo $error, '<br>';
			}
			foreach ($imageValidation->errors() as $error) {
				echo $error, '<br>';
			}
		}

	}
}
 
?>


<form action="" method="post" enctype="multipart/form-data">
	
	<div class="field">
		<label for="username">Username</label>
		<input type="text" name="username" value="<?php echo escape($user->data()->username);  ?>">
	</div>

	<div class="field">
		<label for="name">Name</label>
		<input type="text" name="name" value="<?php echo escape($user->data()->name);  ?>">
	</div>

	<div class="field">
		<label for="image">Profile Picture</label>
		<input type="file" name="image"><img src="images/<?php echo escape($user->data()->image); ?>" required width="50" height="50">

	</div>

	<input type="submit" value="Update">
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	


</form>