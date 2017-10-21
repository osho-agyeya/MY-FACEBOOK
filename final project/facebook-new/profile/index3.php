<?php
    require_once('../auth.php');
?>
<!DOCTYPE html>
<html class="full" lang="en">
<head>
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>The Big Picture - Start Bootstrap Template</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/the-big-picture.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../drop.css">
</head>
<body>
<div style="position: absolute;  width: 100px; top:0; right:5px;  ">
<div class="dropdown">
  <button class="dropbtn"> <img src="../fb3.png" class="image" />  </button>
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
<img src="../fb6.png" width="100" height="100" alt=""/>
</button>
<div class="dropdown-content">
    <a href="messages.php">Message</a>
    <a href="group.php">Global chat</a>
    
  </div>
</div>
</div>
<br><br><br>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a class="one" href="#">Dashboard</a>
                </li>
                <li>
                    <a class="one" href="edit.html">Editing</a>
                </li>
                <li>
                    <a class="one" href="#">Interests</a>
                </li>
                <li>
                    <a class="one" href="#">Home</a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper ">   
        <div id="overview">
        <a class="two" href='practice.html'>
        <img src="imp1.jpg" height="160px" width="160px" align="middle"></a>
        <p>Please click the above picture to change your Display Picture.</p>
        <h3> About me!</h3>
        <p> Say something about yourself in about 200 words.</p>
        <div class="desc">
        <center>
        <!--HERE we shall echo form back end-->
            <h4>Name: <?php echo $_SESSION['SESS_name'];?></h4>
            <h4>Date of Birth:.....</h4>
            <h4>Email-id: <?php echo $_SESSION['SESS_email'];?></h4>
            <h4>Gender:.....</h4>
        </center>
        </div>
        </div>
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
    </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>
