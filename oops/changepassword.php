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
			$validation = $validate->check($_POST, [
						'password_current' => [
						   			  'required' => true,
						   			  'min' => 6
						   			  ],
						'password_new' => [
						   			  'required' => true,
						   			  'min' => 6
						   			  ],
						'password_new_again' => [
						 				'required' => true,
						   				'matches' => 'password_new'
						   					]
						   ]);

			if($validation->passed()) {

				if(Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password) {
					echo 'Your current Password is wrong.';
				} else {
					$salt = Hash::salt(32);
					$user->updateAccount([
							'password' => Hash::make(Input::get('password_new'), $salt),
							'salt' => $salt
							]);
					Session::flash('home', 'Password Changed successfully!!');
					Redirect::to('index.php');

				}

			} else {
				foreach ($validation->errors() as $error) {
					echo $error,  '<br>';
				}
			}

		}
	}



?>


<form action="" method="post">
	
	<div class="field">
		<label for="password_current">Current Password</label>
		<input type="password" name="password_current" id="password_current">
	</div>

	<div class="field">
		<label for="password_new">New Password</label>
		<input type="password" name="password_new" id="password_new" >
	</div>

	<div class="field">
		<label for="password_new_again">New Password again</label>
		<input type="password" name="password_new_again" id="password_new_again">
	</div>

	<input type="submit" value="Change">
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" >
	


</form>

