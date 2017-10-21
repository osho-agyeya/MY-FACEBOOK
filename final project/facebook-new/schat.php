<?php
    require_once('auth.php');
     include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>chattng service</title>
</head>


<link rel="stylesheet" type="text/css" href="drop.css">
<link rel="stylesheet" type="text/css" href="post.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<body>


<div class="stuck"> 

<a href="m.php">
<button type="button" class="btn btn-primary" >
<h1>
 Hello 
 <?php 
 echo $_SESSION['SESS_name']  ?>
 !
 </h1>
</button>
</a>



<div style="position: absolute;  width: 100px; top:0; right:5px;  ">
<div class="dropdown">
  <button class="dropbtn"> <img src="fb3.png" class="image" />  </button>
  <div class="dropdown-content">
    <a href="home.php">Home</a>
    <a href="m.php">Profile</a>
    <a href="Rpass.php">Change pass &nbsp; &nbsp; </a>
    <a href="login.php">Log out</a>
  </div>
</div>
</div>

<div style=" position: absolute;  top:-5px; right: 70px;  ">
<div class="dropdown">
  <button class="dropbtn">
<img src="fb6.png" width="100" height="100" alt=""/>
</button>
<div class="dropdown-content">
    <a href="messages.php">Message</a>
    <a href="schat.php">Global chat</a>
    
  </div>
</div>
</div>
</div>









<form method="post" action="schat.php">
<center><textarea name="chatm" rows="5" cols="25"  placeholder="What's on your mind?"></textarea><br>
<input type="submit" value="Send" name="submit" ></center>
</form>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
	
    

$query1="SELECT * FROM chat";

        $result = mysqli_query($connection,$query1);
        if (!$result) echo "INSERT failed: $query<br>" .      $connection->error . "<br><br>";
        else
        {   

            while($row=mysqli_fetch_row($result))
            {
                 echo "&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;".$row[1].": ".$row[2]."<br><br>";
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