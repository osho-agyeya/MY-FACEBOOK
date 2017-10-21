<?php
    require_once('auth.php');
     include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head><?php
    require_once('auth.php');
     include 'connection.php';
?>
	<title>Messages</title>
</head>
<body>

</body>
</html>
<?php
	 include 'connection.php';
    unset($_SESSION['to']);

$query1="SELECT * FROM user";

        $result = mysqli_query($connection,$query1);
        if (!$result) echo "INSERT failed: $query<br>" .      $connection->error . "<br><br>";
        else
        {   ?>  
        	<form method="post" attribute="post" action="messages.php">
        	<table>
        	 <?php
            while($row=mysqli_fetch_row($result))
            {   ?> 

            	<tr>
            	<td>  <?php echo $row[1];  $_SESSION['to']=$row[0]; ?></td>
            	<td><?php echo $row[2]; ?></td>
            	<td><button type="submit" value="<?php echo $row[0]; ?>" name="chat">Chat</button>
            	</td>
            	</tr>
                 
                 </form>
     <?php


            }
            }




if(isset($_POST['chat'])){ 
 $_SESSION['to']=$_POST['chat'];
    ?>
<script type="text/javascript"> 
        window.location="test.php";
        </script>
    <?php
   

}

?>
