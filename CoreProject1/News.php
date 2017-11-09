<?php
	include('databaseConnection.php');
	session_start();
?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="prof.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	<style>
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn,.signupbtn {
    float: left;
    width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 200px;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">

	        <a class="navbar-brand" href="Select.php">
	        	<?php 

	        	if(isset($_SESSION["username"]))
	        	{
	        		echo $_SESSION["username"];
	        	}

	        	?>


	        </a>

	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

	            <span class="navbar-toggler-icon"></span>

	        </button>

	        <div class="collapse navbar-collapse" id="navbarSupportedContent">
	            <ul class="navbar-nav mr-auto">

	                <form class="form-inline my-2 my-lg-0" action = "News.php" method = "post">
	                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="list">News List</button>
	                                

	                </form>


	                

	      		</ul>
	      		<ul>
	      			<button class="btn btn-outline-success ">
	                     <?php 
	                       	if(isset($_SESSION["username"])){
						 		echo "<form method = 'post' action='logout.php'>
					               		<input type='submit' name='logout' value='Logout' />
					               		</form>";
							}else{

								echo "<form action='LoginForm.html'>
	                         		<input type='submit' value='Login' />
					             	</form>";
								        	}
	                     ?>
	                                		
	                 </button>
	      		</ul>
	    	</div>
	</nav>

	<form action = "news_process.php" method="post"  enctype="multipart/form-data">

   		 <div class="container">

		      <input type = "text" placeholder = "title" name = "title" required>

		      <input type = "text" placeholder = "description" name="description" size ="400" required>

		      <label><b>Choose a picture</b></label>
		      <input type = "file" name = "imagefile">
		      
		      <input type="checkbox" checked="checked"> Remember me
   

		    <div class="clearfix">
		        <button type="button"  class="cancelbtn">Cancel</button>
		        <button type="submit" name="upload" class="signupbtn">Upload</button>
      		</div>

    	</div>

  	</form>


</body>
</html>

