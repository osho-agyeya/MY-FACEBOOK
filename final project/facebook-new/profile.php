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

.abc{
  margin-top:70px;
  margin-left:50%;
  z-index: 1;

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
<br>
<br>
<br>
<div class="abc">
<form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit"/>
            
          
         
            
      </form>
      
</div>

</div>
</body>
</html>
<?php
$f_name="";
$f_size="";
$f_type="";
$f_status="";


     

   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      //$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
     
      $file_ext=(strtolower(end((explode('.',$file_name)))));
      
      $expensions= array("jpeg","jpg");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$_SESSION['SESS_id']."."."jpeg");
         $f_name="Sent file: ".$_FILES['image']['name'];
         $f_size="File size: ".$_FILES['image']['size'];
         $f_type="File type: ".$_FILES['image']['type'];
         $f_status="File Successfully Uploaded";
      }
      else{
         print_r($errors);
      }

   echo $f_status;
   }
?>