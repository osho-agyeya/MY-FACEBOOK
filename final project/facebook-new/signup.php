<!DOCTYPE html>
<?php
include 'connection.php';
include 'function.php';
 
$error="";
$error_in_name="";
$error_in_email="";
$error_in_email1="";
$error_in_password="";
$error_in_password1="";
$error_in_number="";
$error_in_dob="";


if (isset($_POST['submit'])) 
{
    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $name=$fname." ".$lname;
    $email=$_POST['email'];
    $password=$_POST['password'];
    $dob_day=$_POST['dob_day'];
    $dob_month=$_POST['dob_month'];
    $dob_year=$_POST['dob_year'];
    $dob=$dob_day.'/'.$dob_month.'/'.$dob_year;
    

     if(($_POST['gender'])==1)
        $gender="Female";
    else if (($_POST['gender'])==2)
        $gender="Male";
    else
    	$gender="Other";


    $error_in_email=email_exist($email,$connection);
    $error_in_email1=valid_email($email);
    $error_in_dob=valid_dob($dob_day,$dob_month,$dob_year);

    if($error_in_email=="" and $error_in_email1=="" and $error_in_dob==""){$flag=1; }
    else{$flag=0; }
  
    if($flag==1)
    {  $query="INSERT INTO user(name,email,password,dob,gender) VALUES('$name','$email','$password','$dob','$gender')";
       $result = mysqli_query($connection,$query);
       if (!$result)echo "INSERT failed: $query<br>".$connection->error . "<br><br>";
 ?>
        <script type="text/javascript">
        window.alert("Signup Successfull");
        </script>
       
        <script type="text/javascript"> 
        window.location="login.php";
        </script>
<?php  
    }
      else{ 

?>
        <script type="text/javascript">
        window.alert("<?php echo $error_in_email.'\n'.$error_in_email1.'\n'.$error_in_dob ?>");
        </script>
<?php

}

}
?>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Facebook-SignUp</title>
    <link rel="icon" href="fb4.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="signup.css">
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
			<div>Face<span>Book</span></div>
		</div>
       <br>
		<br>
		<div class="signup">Signup</div>
		<br>
		<section class="box">
		<form action='signup.php' method='post' >
		<div class="login">
		        <input type="text" placeholder="First name" name="fname" required>
		        <br>
		        <input type="text" placeholder="Last name" name="lname" required>
		        <br><br><br>
		        <input type="email" placeholder="Email" name="email" required>
		        <br>
				<input type="password" placeholder="Password" name="password" required><br><br><br><br>
     
                 <div >
			<span  data-type="selectors" data-name="birthday_wrapper" id="u_0_d">
			<span><select aria-label="Day" name="dob_day" id="day" title="Day" required>
			<option value="0" selected>Day</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
			<option value="29">29</option>
			<option value="30">30</option>
			<option value="31">31</option>
			</select>
			<select aria-label="Month" name="dob_month" id="month" title="Month">
			<option value="0" selected>Month</option>
			<option value="1">Jan</option>
			<option value="2">Feb</option>
			<option value="3">Mar</option>
			<option value="4">Apr</option>
			<option value="5">May</option>
			<option value="6">Jun</option>
			<option value="7">Jul</option>
			<option value="8">Aug</option>
			<option value="9">Sept</option>
			<option value="10">Oct</option>
			<option value="11">Nov</option>
			<option value="12">Dec</option>
			</select><select aria-label="Year" name="dob_year" id="year" title="Year" >
			<option value="0" selected>Year</option>
			<option value="2016">2016</option>
			<option value="2015">2015</option>
			<option value="2014">2014</option>
			<option value="2013">2013</option>
			<option value="2012">2012</option>
			<option value="2011">2011</option>
			<option value="2010">2010</option>
			<option value="2009">2009</option>
			<option value="2008">2008</option>
			<option value="2007">2007</option>
			<option value="2006">2006</option>
			<option value="2005">2005</option>
			<option value="2004">2004</option>
			<option value="2003">2003</option>
			<option value="2002">2002</option>
			<option value="2001">2001</option>
			<option value="2000">2000</option>
			<option value="1999">1999</option>
			<option value="1998">1998</option>
			<option value="1997">1997</option>
			<option value="1996">1996</option>
			<option value="1995">1995</option>
			<option value="1994">1994</option>
			<option value="1993">1993</option>
			<option value="1992">1992</option>
			<option value="1991">1991</option>
			<option value="1990">1990</option>
			<option value="1989">1989</option>
			<option value="1988">1988</option>
			<option value="1987">1987</option>
			<option value="1986">1986</option>
			<option value="1985">1985</option>
			<option value="1984">1984</option>
			<option value="1983">1983</option>
			<option value="1982">1982</option>
			<option value="1981">1981</option>
			<option value="1980">1980</option>
			<option value="1979">1979</option>
			<option value="1978">1978</option>
			<option value="1977">1977</option>
			<option value="1976">1976</option>
			<option value="1975">1975</option>
			<option value="1974">1974</option>
			<option value="1973">1973</option>
			<option value="1972">1972</option>
			<option value="1971">1971</option>
			<option value="1970">1970</option>
			<option value="1969">1969</option>
			<option value="1968">1968</option>
			<option value="1967">1967</option>
			<option value="1966">1966</option>
			<option value="1965">1965</option>
			<option value="1964">1964</option>
			<option value="1963">1963</option>
			<option value="1962">1962</option>
			<option value="1961">1961</option>
			<option value="1960">1960</option>
			<option value="1959">1959</option>
			<option value="1958">1958</option>
			<option value="1957">1957</option>
			<option value="1956">1956</option>
			<option value="1955">1955</option>
			<option value="1954">1954</option>
			<option value="1953">1953</option>
			<option value="1952">1952</option>
			<option value="1951">1951</option>
			<option value="1950">1950</option>
			<option value="1949">1949</option>
			<option value="1948">1948</option>
			<option value="1947">1947</option>
			<option value="1946">1946</option>
			<option value="1945">1945</option>
			<option value="1944">1944</option>
			<option value="1943">1943</option>
			<option value="1942">1942</option>
			<option value="1941">1941</option>
			<option value="1940">1940</option>
			<option value="1939">1939</option>
			<option value="1938">1938</option>
			<option value="1937">1937</option>
			<option value="1936">1936</option>
			<option value="1935">1935</option>
			<option value="1934">1934</option>
			<option value="1933">1933</option>
			<option value="1932">1932</option>
			<option value="1931">1931</option>
			</select></span></span>
			</div>
             <br><br><br>
             <div class="text" >
           
              Female<input type="radio" name="gender" value="1"  >
              Male<input type="radio" name="gender" value="2">
              Other<input type="radio" name="gender" value="3">
                  <input type="submit" value="Sign Up" name="submit">
				

         </div>
         </div>
         </form>
		
		</form>

		<span class="text1">
           
<br>
            <a href="login.php">&nbsp; &nbsp; &nbsp;Login Here</a></span>
       </section>


   

  
    
    
    
  </body>
</html>
