<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/style.css">

<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
  <h3 class="w3-bar-item">Admin Menu</h3>
  <a href="#" class="w3-bar-item w3-button">
    <form method="post" action="ViewUserProfile.php">
        <button type="submit" value="Home">Home</button>
    </form>
</a>
  <a href="#" class="w3-bar-item w3-button">
    <form method="post" action="UpdateUserProfile.php">
        <button type="submit" name="update" value="Update" >Update </button>
    </form>
  </a>
  <a href="#" class="w3-bar-item w3-button">
    <form method="post" action="DeleteUserProfileProcess.php">
        <button type="submit" value="Delete">Delete</button>
    </form>

  </a>
  <a href="#" class="w3-bar-item w3-button">
    <form method = 'post' action='ViewUserList.php'>
        <button type='submit' name='logout' value='Userlist'>Userlist</button>
    </form>
  </a>
  <a href="#" class="w3-bar-item w3-button">
    <form method = 'post' action='logoutprocess.php'>
        <button type='submit' name='logout' value='Logout'>Logout</button>
    </form>
  </a>
   
</div>

<!-- Page Content -->
<div style="margin-left:25%">

<div class="w3-container w3-teal">
  <h1><?php echo $username?></h1>
</div>
