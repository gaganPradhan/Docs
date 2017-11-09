

<?php 

require_once 'core/init.php';
require_once 'includes/header.php';



$checkSession = new user();
if(!$checkSession->isLoggedIn()) {	
	Redirect::to('index.php');
}

else {


if(Input::exists()) {
	if(Token::checkToken(Input::get('token'))) {
		$validate = new Validation();		
		$validation = $validate->check($_POST, [
					  'name' => [
							'required' => true,
							'min' => 2,
							'max' => 64,	
							],
					   
					   'detail' => [
					   		'required' => true,
					   		'min' => 2,
					   		'max' =>250,					   		
					   		]
					   	]);

		
		if($validation->passed()) {
			
			$user = new User();
			$image = new Image();

			$salt = Hash::salt(32);
			try {			
				$user->createRequest([
					'inventory_name'  => Input::get('name'),					
					'detail'     => Input::get('detail'),
					'user_id'    => Input::get('user_id'),	
					'request_date'=> date("Y-m-d"),
					'status' => "pending"			
				]);
				

			} catch(Exception $e) {
				die($e->getMessage());
			}

			 Session::flash('home', 'Your request has been submitted');
			 Redirect::to('index.php');


		} else {
			foreach ($validation->errors() as $error) {
				echo $error, '<br>';
			}			
		}
	}
}

?>

<?php 

			$user = new User();					
			$userid = $user->data()->id;


	?>		


<form action="" method="post" enctype="multipart/form-data">
	
	<div class="field">
		<label for="name">Inventory Name</label>
		<input type="text" name="name" id="name"  value="<?php echo escape(Input::get('name')); ?>" autocomplete="off">
	</div>	
	
	<div class="field">
		<label for="detail">Comments</label>
		<textarea name="detail" id="detail" value="<?php echo escape(Input::get('detail')); ?>" ></textarea>
	</div>	

	<input type="hidden" name="user_id" value = "<?php echo $userid; ?>">
	<input type="submit" name="submit" value="Register">
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	

</form>


<?php } ?>