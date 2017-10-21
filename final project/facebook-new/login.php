<!DOCTYPE html>


<?php
   // Start session
    session_start();    
    //Unset the variables stored in session
    unset($_SESSION['SESS_email']);
    unset($_SESSION['SESS_name']);
    unset($_SESSION['SESS_id']);
    //logout condition
?>

   
<?php 
 include 'connection.php';
 include 'function.php';
 $email_error ="";
 $password_error="";

if(isset($_POST['Submit'])){
  
    
  
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
       
        $check=0;
       
        if($email=="")
            { $email_error ="Empty email";}

        if($password=="")
             {$password_error="Empty password";}


        $query="SELECT * FROM user WHERE email='$email' and password='$password'";
        $result = mysqli_query($connection,$query);
        if (!$result) echo "INSERT failed: $query<br>".$connection->error . "<br><br>";
        else
        {   

            while($row=mysqli_fetch_row($result))
            {
                if($email==$row[2] && $password==$row[3])
                  {  $check=1;
                    $name=$row[1];
                    
                    $myid=$row[0];
                  } 
            }
        }
        if($check==0)
        { ?>
            <script type="text/javascript">
        window.alert("Invalid Detail");
        </script>
       
        <?php
           } 
        else 
        { $_SESSION['SESS_email']= $email;       
          $_SESSION['SESS_name']=$name;
          $_SESSION['SESS_id']=$myid;
?>        
        <script type="text/javascript">
        window.location="home.php";
        </script>

<?php
        }   
    }
}
?>      
<html >



  <head>
    <meta charset="UTF-8">
    <title>Facebook-Login</title>
    <link rel="icon" href="fb3.png" type="image/png">
    
    <link rel="stylesheet" type="text/css" href="login.css">
    
        <style>
           @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
           @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

        </style>

    
        <script src="js/prefixfree.min.js"></script>

    
  </head>

  <body>
     
    <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Face<span>Book</span>
			           
			</div>

			
		</div>
    <br>
    <br>
		<br>
		<div class="text">Login</div>
    <br>
		<br>
    <br>
		
		<section class="box">
		<form action='login.php' method='post' >
		<div class="login">
				<input type="email" placeholder="email" name="email" required><br>
				<input type="password" placeholder="password" name="password" required><br>
				<input type="submit" value="Login" name="Submit"  >
            <br>
            <br>
            <div class="text1">
            <br>
            <a href="signup.php">&nbsp;  &nbsp; Sign Up Here  </a></div>
		</div>

		</form>
       </section>



    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    
    
    
    
  </body>
</html>
