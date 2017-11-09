

<?php

	include('databaseconnection.php');
	if(isset($_GET["read"])){

		$id  = $_GET["read"];
		$select = "SELECT * FROM news WHERE newsid = '$id'";
		$result = mysqli_query($connection,$select);
		$row 	= mysqli_fetch_assoc($result);

	



}



?>
<?php include ('header.php');?>


<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="<?php echo 'static/' . $row['Image'];?>" width=200 alt="" class="img-rounded img-responsive" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-8">
                        <h4><?php echo $row["Title"]; ?></h4>
                        
                        <p>
                            <i class="glyphicon glyphicon-envelope">Description </i><?php echo $row["Description"];?>
                            <br />
                            
                            <br />
                            <i class="glyphicon glyphicon-gift">Date </i><?php echo $row["Date"]?></p>
                        <!-- Split button -->
                       
                    </div>
               
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
        flag = <?php echo $flag?>

            if()
            alert()
</script>

</body>
</html>

</body>
</html>
