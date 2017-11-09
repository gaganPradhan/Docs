<?php 

require_once 'core/init.php';
require_once 'includes/header.php';



$checkSession = new user();
if($checkSession->isLoggedIn()) {
	Session::flash('home', 'You are logged in. plz logout to Register new account !!!');
	Redirect::to('index.php');
}

else {


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
					   'password' => [
					   		'required' => true,
					   		'min' => 6
					   		],
					   'password_again' => [
					   		'required' => true,
					   		'matches' => 'password'
					   		],
					   'name' => [
					   		'required' => true,
					   		'min' => 2,
					   		'max' =>50,
					   		'nameType' => '/^[a-zA-Z\s]+$/' //only alphabets and whitespaces allowed
					   		]
					   	]);

		$imageValidation = $imageValidate->check($_FILES, [
							'image' => [
								'tmpName' => null,
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
			
			$user = new User();
			$image = new Image();

			$salt = Hash::salt(32);
			try {
				$image->uploadImage(Input::get('image'), './images/');
				$user->createUser([
					'dept_id'  => Input::get('department'),
					'username' => Input::get('username'),
					'password' => Hash::make(Input::get('password'), $salt),

					'salt' 	   => $salt,
					'name'     => Input::get('name'),
					'image'    => $image->getImageName(),
					'groups'   => 1	
				]);
				

			} catch(Exception $e) {
				die($e->getMessage());
			}

			 Session::flash('home', 'You have been registered and you can now log in!!');
			 Redirect::to('index.php');


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

<?php 

			$user = new User();
			$departments =  new Department();
            $data = $departments->getDepartment();
            $datas = $departments->data();
        

	?>		


<form action="" method="post" enctype="multipart/form-data">
	
	<div class="field">
		<label for="username">Username</label>
		<input type="text" name="username" id="username"  value="<?php echo escape(Input::get('username')); ?>" autocomplete="off">
	</div>	

	<div class="field">
		<label for="password">Choose a Password</label>
		<input type="password" name="password" id="password" >
	</div>

	<div class="field">
		<label for="password_again">Enter your password again</label>
		<input type="password" name="password_again" id="password_again" >
	</div>

	<div class="field">
		<label for="name">Enter your Full Name</label>
		<input type="text" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>" >
	</div>

	<div class="field">
		<label for="department">Choose Department</label>
		<select name="department">
			<option value="0"> choose Department</option>
			<?php 
			foreach ($datas as $dept) {            
        	?>
			<option value="<?php echo $dept->id; ?>"> <?php echo $dept->department_name;?> </option>			
			<?php } ?>
		</select>
	</div>

	<div class="field">
		<label for="image">Select a profile picture</label>
		<input type="file" name="image" id="image"  >
	</div>

	<input type="submit" name="submit" value="Register">
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	

</form>


<?php } ?>