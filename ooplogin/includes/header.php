
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<!DOCTYPE html>
<html>
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<body>



    <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <table width="650" align="center" bgcolor="white" border=6 >
        <tr align="center">
            <td> <a href="index.php">Home</a></td>
            <th>
                <a class="navbar-brand" href="#">
                    <?php 
                    $user = new User();
                    if($user->isLoggedIn())
                    {?>
                       <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a>
                    
                </a>                
            </th>
            <td><a href="updateaccount.php">Update Details</a></td>
             <td><a href="changepassword.php">Change Password</a></td>   
            <td><a href="deleteaccount.php">Delete Account</a></td>
            <td><?php 
                    $data = $user-> data();
                    $user_id = $data-> id;
                    $datas = $user->getRequest($user_id);
                    $flag = 0;
                    if($datas){
                        foreach ($user->data() as $data) {          
                            if(strcasecmp($data->status, "pending") != 0){
                                $flag++;                
                            }   
                            else{
                                $flag = 0;                              
                            }
                        }
                    }
                    if($flag != 0){
                        ?>
                        <a href="submitrequests.php">Request Inventory</a>
                        <?php       
                    }
                    else{
                        echo "Request pending";
                    }
                }
                    $user = new User();
                    ?>  </td>   
                    <?php 
                    if($user->isLoggedIn()){?>
                       

                    <?php 
                        if($user->hasPermission('admin')) {
                            echo '<p> Admin Logged In. </p>'; 
                            ?><ul>

                            <td><a href="viewprofiles.php">View User Profiles</a></td>  
                            <td><a href="viewrequests.php">View Requests</a></td>       
                            </ul>
                            <?php
                        }


                        ?>
                         <td>
                            <form method = 'post' action='logout.php'>                                            
                                <button type='submit' name='logout' value='Logout' >Logout</button>
                            </form>
                         </td>
                    </tr>
                    </table> 
                    <?php
                    }else{?>
                    <td>
                        <form action='Login.php'>
                            <button type='submit' value='Login'>Log In</button>
                        </form>
                    </td>
                    <td>
                    <form action = 'register.php'>
                        <button type="submit" name='register' value='register'>Register</button>
                    </form>
                    </td>
                    </table>
                    <?php } ?> 
                </ul>
            </div>
    </nav>
