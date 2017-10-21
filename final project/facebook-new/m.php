<?php
	require_once('auth.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>USER-DETAILS</title>
    <link rel="stylesheet" type="text/css" href="drop.css">
</head>
<style type="text/css">

.style1 {
  font-size: 36px;
  font-weight: bold;
}



.stuck {
    position: fixed;
    top: 10px;
    left: 10px;
    bottom: 10px;
    /*width: 200px; */
    width: 100%;
    overflow-y: auto;
    overflow-x: hidden;
}

</style>
<link rel="stylesheet" type="text/css" href="drop.css">
<link rel="stylesheet" type="text/css" href="post.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>





<body>


<a href="m.php">
<button type="button" class="btn btn-primary" >
<h1>
 Hello 
 <?php 
 echo $_SESSION['SESS_name'] ?>
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
    <a href="group.php">Global chat</a>
    
  </div>
</div>
</div>

<br>
<br>




<br><br>
<br><br>
<?php 
 include 'connection.php';
$email=$_SESSION['SESS_email'];
$name =$_SESSION['SESS_name'];
$query="SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($connection,$query);
        if (!$result) echo "INSERT failed: $query<br>" .      $connection->error . "<br><br>";
        else
        {   

            while($row=mysqli_fetch_row($result))
            {
                if($email==$row[2] )
                  {  
                  	
                    $dob=$row[4];
                    $gender=$row[5];
                    
                  } 
            }
        }


 ?>

<a href="m.php">
<button type="button" class="btn btn-primary" text-align="left" style="height:200px;
                    width:400px; " >
<h1>
 <?php 
 echo $_SESSION['SESS_name']; ?>
 
 </h1>
</button>
</a>
<br>
<a href="m.php">
<button type="button" class="btn btn-primary" text-align="left" style="height:200px;
                    width:400px; " >
<h1>
 <?php 
 echo $_SESSION['SESS_email'];?>
  </h1>
</button>
</a>

<br>
<a href="m.php">
<button type="button" class="btn btn-primary" text-align="left" style="height:200px;
                    width:400px; " >
<h1>
 <?php 
 echo $dob;  ?>
  </h1>
</button>
</a>
<br>
<a href="m.php">
<button type="button" class="btn btn-primary" text-align="left" style="height:200px;
                    width:400px; " >
 <?php 
  echo $gender;  ?>
  </h1>
</button>
</a>


</body>
</html>