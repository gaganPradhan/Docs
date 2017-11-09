
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

            <a class="navbar-brand" href="#">
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

            <div align="right" class="collapse navbar-collapse" id="navbarSupportedContent">
               
                <ul>
                    <button class="btn btn-outline-success ">
                                        <?php 
                                        if(isset($_SESSION["username"])){?>
                                                <form method = 'post' action='logoutprocess.php'>

                                                    <input type='submit' name='logout' value='Logout' />
                                                    </form><?php
                                            }else{?>

                                               <form action='Loginpage.php'>

                                                    <input type='submit' value='Login' />
                                                    </form>
                                                <?php
                                            }
                                        ?>
                                            
                                    </button>
                </ul>
            </div>
    </nav>
