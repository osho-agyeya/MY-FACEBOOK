<?php
	require_once('auth.php');
	include 'connection.php';
	include 'function.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>CHANGE-PASS</title>
	<link rel="stylesheet" type="text/css" href="drop.css">
</head>
<body>

<?php 
 $email=$_SESSION['SESS_email'];
 $name=$_SESSION['SESS_name'];


 ?>
 Hello 
 <?php 
 echo $name ?>
 !
<br>
<br>
<?php
      $check=0;
      $password='';
      $password1='';
	  $password2='';
	  $password3='';

$password_error1="";
$password_error2="";
$password_error3="";

if(isset($_POST['Submit'])){

	  $password1=$_POST['password1'];
	  $password2=$_POST['password2'];
	  $password3=$_POST['password3'];


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
                  {   $password=$row[3];
                  	                   
                    
                  } 
            }
        }


$password_error2=valid_password($password2);
$password_error3=valid_password1($password2,$password3) ;       

if($password!=$password1)
               $password_error1='Invalid Password';
 if($password1=="")
                  		$password_error1='Empty password';	

if($password==$password1 and  $password_error2=="" and $password_error3=="")
{    
	 $query="UPDATE  user SET password='$password2' WHERE email='$email'";
	 $result = mysqli_query($connection,$query);
        if (!$result) echo "INSERT failed: $query<br>" .      $connection->error . "<br><br>";
$check=1;

} 


}



?>
<div style="position: absolute;  width: 100px; top:0; right:0;  float:right">



<div class="dropdown">
  <button class="dropbtn"> Goto > &nbsp &nbsp</button>
  <div class="dropdown-content">
    <a href="home.php">Home</a>
    <a href="m.php">Profile</a>
    <a href="Rpass.php">Change pass</a>
    <a href="login.php">Log out</a>
  </div>


</div>
</div>


<?php if($check==1) echo "Password changed sucessfully"; ?>
<form action='Rpass.php' method='post'>
    <fieldset><legend>Change password :</legend>
		<table>
        	<tr>
                <td>
               	           <b>Old Password:</b>
                </td>
                <td>
                     <input type='password' name='password1' style='padding :4px;' />
                </td>
                <td>
                        <?php  echo $password_error1; ?>
                </td>
            </tr>

            <tr>
                <td>
                      <br>
                </td>
            </tr>
            <tr>
                <td>
               	    <b>New Password:</b>
                </td>
                <td>
                    <input type='password' name='password2' style='padding :4px;' />
                </td>
                <td>
                    <?php  echo $password_error2; ?>
                </td>
            </tr>

            <tr>
                <td>
               	     <b>Type Again:</b>
                </td>
                <td>
                     <input type='password' name='password3' style='padding :4px;' />
                </td>
                <td>
                     <?php  echo $password_error3; ?>
                </td>
               </tr>

                <tr>
      			    <td>&nbsp;</td>
      			    <td><input name="Submit" type="submit"  value="Submit" class="button1"></td>
    		   </tr>

               


		</table>




</body>
</html>