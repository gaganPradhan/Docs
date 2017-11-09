<?php 
require_once 'core/init.php';


if(Input::exists()){

	try {
			
				$user->updateRequest([						
						'status'	   => Input::get('select'),
						'updated_date' => date("Y-m-d"),
						'remarks'      => Input::get('remark')	

						], Input::get('id'));
				Session::flash('home', 'Your details have been updated');
				Redirect::to('viewrequests.php');

			} catch(Exception $e) {
				die($e->getMessage());
			}

}else{
	Redirect::to(404);
}