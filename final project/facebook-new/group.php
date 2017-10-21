<?php
    require_once('auth.php');
     include 'connection.php';
     unset($_SESSION['to']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   
    <title>facebook messenger chat - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body{
    margin-top:20px;
    background:#eee;
}
.row.row-broken {
    padding-bottom: 0;
}
.col-inside-lg {
    padding: 20px;
}
.chat {
    height: calc(100vh - 180px);
}
.decor-default {
    background-color: transparent;
}
.chat-users h6 {
    font-size: 20px;
    margin: 0 0 20px;
}
.chat-users .user {
    position: relative;
    padding: 0 0 0 50px;
    display: block;
    cursor: pointer;
    margin: 0 0 20px;
}
.chat-users .user .avatar {
    top: 0;
    left: 0;
}
.chat .avatar {
    width: 40px;
    height: 40px;
    position: absolute;
}
.chat .avatar img {
    display: block;
    border-radius: 20px;
    height: 100%;
}
.chat .avatar .status.off {
    border: 1px solid #5a5a5a;
    background: #ffffff;
}
.chat .avatar .status.online {
    background: #4caf50;
}
.chat .avatar .status.busy {
    background: #ffc107;
}
.chat .avatar .status.offline {
    background: #ed4e6e;
}
.chat-users .user .status {
    bottom: 0;
    left: 28px;
}
.chat .avatar .status {
    width: 10px;
    height: 10px;
    border-radius: 5px;
    position: absolute;
}
.chat-users .user .name {
    font-size: 14px;
    font-weight: bold;
    line-height: 20px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.chat-users .user .mood {
    font: 200 14px/30px "Raleway", sans-serif;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/*****************CHAT BODY *******************/
.chat-body h6 {
    font-size: 20px;
    margin: 0 0 20px;
   background-color: transparemt;
}
.chat-body .answer.left {
    padding: 0 0 0 58px;
    text-align: left;
    float: left;
}
.chat-body .answer {
    position: relative;
    max-width: 600px;
    overflow: hidden;
    clear: both;
}
.chat-body .answer.left .avatar {
    left: 0;
}
.chat-body .answer .avatar {
    bottom: 36px;
}
.chat .avatar {
    width: 40px;
    height: 40px;
    position: absolute;
}
.chat .avatar img {
    display: block;
    border-radius: 20px;
    height: 100%;
}
.chat-body .answer .name {
    font-size: 14px;
    line-height: 36px;
}
.chat-body .answer.left .avatar .status {
    right: 4px;
}
.chat-body .answer .avatar .status {
    bottom: 0;
}
.chat-body .answer.left .text {
    background: #ebebeb;
    color: #333333;
    border-radius: 8px 8px 8px 0;
}
.chat-body .answer .text {
    padding: 12px;
    font-size: 16px;
    line-height: 26px;
    position: relative;
}
.chat-body .answer.left .text:before {
    left: -30px;
    border-right-color: #ebebeb;
    border-right-width: 12px;
}
.chat-body .answer .text:before {
    content: '';
    display: block;
    position: absolute;
    bottom: 0;
    border: 18px solid transparent;
    border-bottom-width: 0;
}
.chat-body .answer.left .time {
    padding-left: 12px;
    color: #333333;
}
.chat-body .answer .time {
    font-size: 16px;
    line-height: 36px;
    position: relative;
    padding-bottom: 1px;
}
/*RIGHT*/
.chat-body .answer.right {
    padding: 0 58px 0 0;
    text-align: right;
    float: right;
}

.chat-body .answer.right .avatar {
    right: 0;
}
.chat-body .answer.right .avatar .status {
    left: 4px;
}
.chat-body .answer.right .text {
    background: #7266ba;
    color: #ffffff;
    border-radius: 8px 8px 0 8px;
}
.chat-body .answer.right .text:before {
    right: -30px;
    border-left-color: #7266ba;
    border-left-width: 12px;
}
.chat-body .answer.right .time {
    padding-right: 12px;
    color: #333333;
}

/**************ADD FORM ***************/
.chat-body .answer-add {
    clear: both;
    position: relative;
    margin: 20px -20px -20px;
    padding: 20px;
    background: #46be8a;
}
.chat-body .answer-add input {
    border: none;
    background: none;
    display: block;
    width: 100%;
    font-size: 16px;
    line-height: 20px;
    padding: 0;
    color: #ffffff;
}
.chat input {
    -webkit-appearance: none;
    border-radius: 0;
}
.chat-body .answer-add .answer-btn-1 {
    background: url("http://91.234.35.26/iwiki-admin/v1.0.0/admin/img/icon-40.png") 50% 50% no-repeat;
    right: 56px;
}
.chat-body .answer-add .answer-btn {
    display: block;
    cursor: pointer;
    width: 36px;
    height: 36px;
    position: absolute;
    top: 50%;
    margin-top: -18px;
}
.chat-body .answer-add .answer-btn-2 {
    background: url("http://91.234.35.26/iwiki-admin/v1.0.0/admin/img/icon-41.png") 50% 50% no-repeat;
    right: 20px;
}
.chat input::-webkit-input-placeholder {
   color: #fff;
}

.chat input:-moz-placeholder { /* Firefox 18- */
   color: #fff;  
}

.chat input::-moz-placeholder {  /* Firefox 19+ */
   color: #fff;  
}

.chat input:-ms-input-placeholder {  
   color: #fff;  
}
.chat input {
    -webkit-appearance: none;
    border-radius: 0;
}
    </style>
</head>

<link rel="stylesheet" type="text/css" href="drop.css">
<link rel="stylesheet" type="text/css" href="post.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>





<body>
<script type="text/javascript">function scroll_to(div){
   if (div.scrollTop < div.scrollHeight - div.clientHeight)
        div.scrollTop += 10; // move down

}</script>
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
    <a href="group.php">Global chat</a>
    
  </div>
</div>
</div>
</div>

<br><br>
<br><br>
<br><br>


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>
<div class="content container-fluid bootstrap snippets">
      <div class="row row-broken">
        <div class="col-sm-3 col-xs-12">
          <div class="col-inside-lg decor-default chat" style="overflow: hidden; outline: none;" tabindex="5000">
            <div class="chat-users">
              <h6>People</h6>
                 <!--     -->

                  <?php
     include 'connection.php';
    unset($_SESSION['to']);

$query1="SELECT * FROM user";

        $result = mysqli_query($connection,$query1);
        if (!$result) echo "INSERT failed: $query<br>" .      $connection->error . "<br><br>";
        else
        {   ?>  
            <form method="post" attribute="post" action="group.php">
            
             <?php
            while($row=mysqli_fetch_row($result))
            {   ?> 
                
                  <div class="user">
                    <div class="avatar">
                    <img src="images/<?php echo $row[0] ?>.jpeg" alt="User name">
                    <div class="status off"></div>
                    </div>
                    <div class="name"><?php echo $row[1];  $_SESSION['to']=$row[0]; ?></div>
                    <div class="mood"><?php echo $row[2]; ?><br>
                    <button type="submit" value="<?php echo $row[0]; ?>" name="chat">Chat</button></div>

                </div>
                
                 
     <?php


            } ?>  </form> <?php
            }




if(isset($_POST['chat'])){ 
 $_SESSION['to']=$_POST['chat'];
    ?>
<script type="text/javascript"> 
        window.location="test.php";
        </script>
    <?php
   

}

?>






               <!--    -->
                
                
            </div>
          </div>
        </div>
        <div class="col-sm-9 col-xs-12 chat" style="overflow: hidden; outline: none;" tabindex="5001">
          <div class="col-inside-lg decor-default"> 
            <div class="chat-body">
              <h6>Group Chat</h6>
              

              <?php
    
   $myid=$_SESSION['SESS_id'];

$query1="SELECT * FROM chat ORDER BY chat.no DESC";

        $result = mysqli_query($connection,$query1);
        if (!$result) echo "INSERT failed: $query<br>" .      $connection->error . "<br><br>";
        else
        {   

            while($row=mysqli_fetch_row($result))
            {  if($row[1]== $myid ){  ?>


 
               <div class="answer right">
                <div class="avatar">
                  <img src="images/<?php echo $row[1] ?>.jpeg" alt="User name">
                  <div class="status offline"></div>
                </div>
                <div class="name"><b><?php echo $row[2]; ?></b></div>
                <div class="text">
                  <?php echo $row[3]; ?>
                </div>
                <div class="time">5 min ago</div>
              </div>

                 
              <?php } else { ?>  <div class="answer left">
              <div class="avatar">
                  <img src="images/<?php echo $row[1] ?>.jpeg" alt="User name">
                  <div class="status offline"></div>
                </div>
                <div class="name"><b><?php echo $row[2]; ?></b></div>
                <div class="text">
                 <?php echo $row[3]; ?>
                </div>
                <div class="time">5 min ago</div>
              </div>
                 
          <?php } }
            }  ?>
              

             <?php if(isset($_POST['submit'])){

$chatm=$_POST['chatm'];
 $user=$_SESSION['SESS_name'];
$query="INSERT INTO chat(id,name,chat) VALUES( '$myid','$user','$chatm')";
$result = mysqli_query($connection,$query);

       if (!$result)
        echo "INSERT failed: $query<br>" . $connection->error . "<br><br>";
    ?> 
        <script type="text/javascript">
        window.location="group.php";
        </script>

<?php
   
}

 

  

?> 

            </div>
          </div>

        </div>
    
 <form method="post" action="group.php">
    <div class="chat-box bg-white">
                <div class="input-group">
                    <input name="chatm" class="form-control border no-shadow no-rounded" placeholder="Type your message here">
                    <span class="input-group-btn">
                        <input type="submit" value="Send" name="submit" class="btn btn-success no-rounded" type="button">
                    </span>
                </div><!-- /input-group --> 
            </div>  
            </form> 

               </div>  </div>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(function(){
    $(".chat").niceScroll();
})
</script>
</body>
</html>