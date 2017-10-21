<?php
	require_once('auth.php');
	 include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Facebook</title>
<link rel="icon" href="fb5.png" type="image/png">
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

<body style=" background-color:  #d9d9d9; ">


<?php 
 $email=$_SESSION['SESS_email'];
 $name=$_SESSION['SESS_name'];


if(isset($_POST['submit'])){

$post=$_POST['post'];

$query="INSERT INTO data(name,post,email) VALUES('$name','$post','$email')";
       $result = mysqli_query($connection,$query);
       if (!$result)
        echo "INSERT failed: $query<br>" . $connection->error . "<br><br>";
    ?> 
        <script type="text/javascript">
        window.location="home.php";
        </script>

<?php
   
}

 ?>

<div class="stuck"> 

<a href="m.php">
<button type="button" class="btn btn-primary" >
<h1>
 Hello 
 <?php 
 echo $name ?>
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
    <a href="profile.php">Upload Image</a>
    <a href="messages.php">Message</a>
    <a href="group.php">Global chat</a>
    
  </div>
</div>
</div>

<br>
<br>
<br>
<form method="post" action="home.php">
<div>
 <textarea  title="What's on your mind?" placeholder="What's on your mind?" rows="4" cols="40"  name="post"></textarea>
<div class="post">
 
 <br>
&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; 
&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;

<input  class="btn btn-primary"  name="submit" type="Submit"  value="Post"  >

</form>
</div>
<br>
<br>
<br>
<br>
<br><br><br><br><br><br><br><br>

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
                 
                 </form>s
     <?php


            }
            }




if(isset($_POST['chat'])){ 
 $_SESSION['to']=$_POST['chat'];
    ?>
<script type="text/javascript"> 
        window.location="message.php";
        </script>
    <?php
   

}

?>
</div>

</body>
</html>