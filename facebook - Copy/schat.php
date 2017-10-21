<?php
    require_once('auth.php');
     include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>chattng service</title>
	<link rel="stylesheet" type="text/css" href="gccss.css">
</head>
<body >

<form method="post" action="schat.php">
<center><textarea name="chatm" rows="5" cols="25"  placeholder="What's on your mind?"></textarea><br>
<input type="submit" value="Send" name="submit" ></center>
</form>

<?php
	
    

$query1="SELECT * FROM chat";

        $result = mysqli_query($connection,$query1);
        if (!$result) echo "INSERT failed: $query<br>" .      $connection->error . "<br><br>";
        else
        {   

            while($row=mysqli_fetch_row($result))
            {
                 echo $row[0].": ".$row[1]."<br>";
            }
            }
    









if(isset($_POST['submit'])){

$chatm=$_POST['chatm'];
 $user=$_SESSION['SESS_name'];
$query="INSERT INTO chat(name,chat) VALUES('$user','$chatm')";
$result = mysqli_query($connection,$query);

       if (!$result)
        echo "INSERT failed: $query<br>" . $connection->error . "<br><br>";
    ?> 
        <script type="text/javascript">
        window.location="schat.php";
        </script>

<?php
   
}

 

	

?>
</body>
</html>