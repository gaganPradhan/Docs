<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	


	<h1>CREATE</h1>

	<form action="create.php" method="post">
		
		<input type = "text" placeholder = "Username" name = "username"/><br>

		<input type = "password" placeholder = "password" name = "password"/><br>

		<input type = "email" placeholder = "Email" name = "email" /><br>

		<input type = "submit" value="submit"/>  
 
	</form>


	<h1>SELECT</h1>
	<form action = "Select.php" method = "post">

		<input type = "number" name = "id" placeholder = "id" /><br>

		<input type = "submit" value = "Select" /><br>
		

	</form>

	<h1>UPDATE</h1>
	<form action = "Update.php" method = "post">

		<input type ="number" name="id" placeholder = "id" /><br>

		<input type = "text" name = "username" placeholder = "Username" /><br>

		<input type = "submit" value = "Update" /><br>
		
	</form>

	<h1>DELETE</h1>
	<form action = "Delete.php" method = "post">

		<input type = "number" name = "id" placeholder = "id" /><br>

		<input type = "submit" value = "Select" /><br>
		

	</form>




</body>
</html>