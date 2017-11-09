<?php 

require_once 'core/init.php';
require_once 'includes/header.php';

$checkSession = new user();
if($checkSession->isLoggedIn()) {
	Session::flash('home', 'You are logged in. plz logout to login again!!!');
	Redirect::to('index.php');
}

else {

if(Input::exists()) {
	if(Token::checkToken(Input::get('token'))) {

		$validate = new Validation();
		$validation = $validate->check($_POST, [
						'username' => ['required' => true],
						'password' => ['required' => true]
						]);
		if($validation->passed()) {
			$user = new user();

			$login = $user->login(Input::get('username'), Input::get('password'));
			if($login) {
				Session::flash('home', 'You have successfully logged in');
				Redirect::to('index.php');
			} else {
				echo '<p> Login Failed!!! </p>';
			}

		} else {
			foreach ($validation->errors() as $error) {
				echo $error, '<br>';
			}
		}
	}
}

?>


<form action="" method="post">

	<div class="field">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" autocomplete="off">
	</div>

	<div class="field">
		<label for="password">Password</label>
		<input type="password" name="password" id="password" >
	</div>

	<!-- <div class="field">
		<label for="remember">
		<input type="checkbox" name="remember" id="remember"> Remember me 
	</div> -->
	<input type="submit" value="Log In">
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	
</form>


<?php } ?>