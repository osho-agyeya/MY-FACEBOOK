<?php
    require_once('auth.php');
     include 'connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form method="post" action="test.php">
<center><textarea name="chatm" rows="5" cols="25"  placeholder="What's on your mind?"></textarea><br>
<input type="submit" value="Send" name="submit" ></center>
</form>
</body>
</html>

<?php


$id=$_SESSION['to'];
 $email=$_SESSION['SESS_email'];
 $name=$_SESSION['SESS_name'];
$myid=$_SESSION['SESS_id'];
//echo $myid;




 

if(isset($_POST['submit'])){

$chatm=$_POST['chatm'];

$query="INSERT INTO pchat(chat,myid,id) VALUES('$chatm','$myid','$id')";
$result = mysqli_query($connection,$query);

       if (!$result)
        echo "INSERT failed: $query<br>" . $connection->error . "<br><br>";
    ?> 
        <script type="text/javascript">
        window.location="test.php";
        </script>

<?php
   
}
   
$query="SELECT * FROM pchat WHERE( (myid=$myid) and (id=$id) or (myid=$id) and (id=$myid))";

        $result = mysqli_query($connection,$query);
        if (!$result) echo "INSERT failed: $query<br>" .      $connection->error . "<br><br>";
        else
        {   

            while($row=mysqli_fetch_row($result))
            {  echo $row[0]."<br>";
            }
        }
 




?>