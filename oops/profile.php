<?php 

require_once 'core/init.php';
require_once 'includes/header.php';


$user = new User();

if(!$user->isLoggedIn()) {
	 Session::flash('home', 'Please LogIn first!!');
	 Redirect::to('index.php');
}


$allowedUser = $user->data()->username;
$username = Input::get('user');
if(!$username  || strcmp($username, $allowedUser) != 0) {
	Session::flash('home', 'Cant view others account details');
	Redirect::to('Index.php');
} else {
	$user = new User($username);
    $department = new Department();	
	if(!$user->exists()) {
		Redirect::to(404);
	} else {
		$data = $user->data();
	    $dpt_id = $data->dpt_id;
        $department->getDepartment([ "id", "=", $dpt_id]);
        $dpt_data = $department->data();        
?>

	<h3> Hello: <?php echo escape($data->username); ?></h3>
	<p><b>Full Name:</b> <?php echo escape($data->name); ?></p>
	<p><b>Department Name:</b><?php echo escape($dpt_data->department_name); ?></p>	
	<p><b>Profile Picture</b><img src='images/<?php echo $data->image ?>'' width='150' height='150' > </p>

<?php		
	} 
} 
?>


