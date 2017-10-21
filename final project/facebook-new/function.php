<?php

function valid_num($number)
 {   if($number=="")
    	{  return "number empty";}
    else if(strlen($number)!=10)
    	{  return "Wrong number";}
    else
    return "";
}

function valid_name($n)                                       //validation of name
{
    if($n=="")
    {return"Please enter your name";  }
    else
        return "";
}

function valid_password($p)         //validation of password
{
    if($p=="")
      return "Enter password" ;
    else if(strlen($p)<8)
    {
        return "Password too short";
       
    }
    else
        return "";
}

function valid_password1($p,$p1)         //validation of password equality
{
    

     if($p=="")
      return "Enter password" ;
    else if($p!=$p1)
    {
        return "Password not match";
        
    }
    else
        return "";
}





function email_exist($email,$connection)
{
	//global $error_in_email;


	$query="SELECT email FROM user WHERE email='$email'";
	$result=mysqli_query($connection,$query);
   if($email="")
          return "Empty email";
	
    else if(mysqli_num_rows($result)>0)
	{
		return "Email exist";
	}
	
	else 
		return "";
}

function valid_email($email)
{ if ($email=="")
  	return "Empty email";
  	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
  return "Invalid email format"; 
  
  else
    return "";
}

function valid_dob($d,$m,$y)
{

	if($d==0 || $m==0 || $y==0)
	{
		return "Choose dob";
	}

  if($y<=date("Y"))
  {
    if($m<=date("m"))
    {
      if($d<=date("d"))
        return "";
      else
        return "Date Should be in past!";
    }
    else
        return "Date Should be in past!";
  }
  else
        return "Date Should be in past!";

}







function validation($name,$password,$password1,$number,$email,$email1,$dob)
{
    
    if($name==""  && $password=="" && $password1=="" && $number==""  && $dob!="Choose dob" && $email=="" && $email1=="")//&& $connection)
    {
        return 1;
    }
    else
        return 0;
}

function email($email,$code)
{

 
$subject  = 'Verification';
$message  = 'Tnx for signup , ur verification code is : '.$code;
$headers  = 'From: magic.man0617@gmail.com' . "\r\n" .
            'Reply-To: magic.man061@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
mail($email, $subject, $message, $headers);

}
?>