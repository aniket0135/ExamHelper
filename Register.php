<?php
require('php_include/header.php');

ob_start();
//session_start();

if (isset($user_name))
{
    echo "You are Already a Member..";
   echo "Please Logout to Register as new Member.";
	header("Location:index.php");
}
?>
   <html>
    <head>
        <title>Registration</title>
    </head>
</html>
<style>

</style>
<?php


 $error = false;
$usernameError = $emailError = $passError = "";
  $first_name  =  $username = $email = "";
 $last_name = $lastnameError = $firstnameError = "";

 if ( isset($_POST['Submit']) ) {
  
  // clean user inputs to prevent sql injections

  $first_name = test_input($_POST["first_name"]);
     
  $last_name = test_input($_POST["last_name"]);
     
  $username = test_input($_POST["username"]);
  
  $email = test_input($_POST["email"]);

  
  $pass = test_input($_POST["pass"]);

     
   ////  
  if (empty($first_name) || empty($last_name)) {
   $error = true;
   $firstnameError = "<p class='wrong'>Please enter your Full name.</p>";
  } else if ((strlen($first_name) < 3) || (strlen($last_name) < 3)) {
   $error = true;
   $firstnameError = "<p class='wrong'>Name must have atleat 3 characters.</p>";
  } else if ((!preg_match("/^[a-zA-Z]+$/",$first_name) || (!preg_match("/^[a-zA-Z]+$/",$last_name)))) {
   $error = true;
   $firstnameError = "<p class='wrong'>Name must contain alphabets and space.</p>";
  }
   
     /////
 /*    if (empty($last_name)) {
   $error = true;
   $lastnameError = "<p class='wrong'>Please enter your last name.</p>";
  } else if (strlen($last_name) < 3) {
   $error = true;
   $lastnameError = "<p class='wrong'>Name must have atleat 3 characters.</p>";
  } else if (!preg_match("/^[a-zA-Z]+$/",$last_name)) {
   $error = true;
   $lastnameError = "<p class='wrong'>Name must contain alphabets and space.</p>";
  }
  */   
  // basic username validation
  if (empty($username)) {
   $error = true;
   $usernameError = "<p class='wrong'>Please enter your Username.</p>";
  } else if (strlen($username) < 3) {
   $error = true;
   $usernameError = "<p class='wrong'>Name must have atleat 3 characters.</p>";
  } else if (!preg_match("/^[a-zA-Z][A-Za-z0-9]+$/",$username)) {
   $error = true;
   $usernameError = "<p class='wrong'>Username must starts with alphabet and contain alphabets or numbers.</p>";
  }
     else {
   // check username exist or not
   $query = "SELECT username FROM ".$prefix."users WHERE username='$username'";
   $result = mysqli_query($conn,$query);
      $row=mysqli_fetch_assoc($result);
     // echo '<pre>',print_r($result),'</pre>';
   if($username==$row['username']){
    $error = true;
    $usernameError = "<p class='wrong'>Provided Username is already in use.</p>";
   }
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "<p class='wrong'>Please enter valid email address.</p>";
  } else {
   // check email exist or not
   $query = "SELECT email FROM ".$prefix."users WHERE email='$email'";
   $result = mysqli_query($conn,$query);
      $row=mysqli_fetch_assoc($result);
     // echo '<pre>',print_r($result),'</pre>';
   if($email==$row['email']){
    $error = true;
    $emailError = "<p class='wrong'>Provided Email is already in use.</p>";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "<p class='wrong'>Please enter password.</p>";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "<p class='wrong'>Password must have atleast 6 characters.</p>";
  }
  
  // password encrypt using md5();
  //$password = md5($pass);
        //$options = ['cost' => 10,];
            // Get the password from post

    $hash_pwd = password_hash($pass, PASSWORD_DEFAULT);
  
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO ".$prefix."users(first_name,last_name,username,email,password,ip,user_level) VALUES('$first_name','$last_name','$username','$email','$hash_pwd','$userip','1')";
   $res = mysqli_query($conn, $query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
           $name = $email = $pass = "";
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
    
  }
  
  
 }
      function test_input($data)
    {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
    }
?>







<div class="container-fluid form-groups col-xs-6">

 <div class="col-sm-3 " style="width:500px; margin-top:50px;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autofill="off" autocomplete="off">
    
     <div class="col-md-12">
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
</div>

<!-- First Name -->
<div class="form-group" >
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <label>
                <input style="width:250px; height:30px; border-radius:5px;"  type="text" name="first_name" class="form-control" placeholder="Enter First Name" maxlength="50" value="<?php echo $first_name ?>" autocomplete="off" />
              </label>
            
            <label>    
             <input style="width:250px; height:30px; border-radius:5px;" type="text" name="last_name" class="form-control" placeholder="Enter Last Name" maxlength="50" value="<?php echo $last_name?>" />
                 </label>
                </div>
                <span class="text-danger"><?php echo $firstnameError; ?></span>
            </div>

 <!-- Last Name          
<div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
           
                </div>
                <span class="text-danger"><?php //echo $nameError; ?></span>
            </div>
-->

<!-- Email Address -->
<div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input style="width:250px; height:30px; border-radius:5px;" type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>


<!-- Username -->
<div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input style="width:250px; height:30px; border-radius:5px;" type="text" name="username" class="form-control" placeholder="Enter Username" maxlength="50" value="<?php echo $username ?>" autocomplete="off" />
                </div>
                <span class="text-danger"><?php echo $usernameError; ?></span>
            </div>


<!-- Password -->
<div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input style="width:250px; height:30px; border-radius:5px;" type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
<br>
<tr class="row3 input">
<td></td><td> 
            
           <div class="form-group">
		<input style="border-radius:10px; background-color:darkgrey; font-weight:700; cursor:pointer;" type="submit" name="Submit" value="Register"><!--or..... <a href="login.php">Sign in Here...</a>-->
            </div>
            
    </td>
   
    </form>
    </div>
</div>
<?php
ob_end_flush(); 
$nameError = $emailError = $passError = "";
  $first_name  =  $username = $email = "";
 $last_name = $last_nameError = $first_nameError = "";

//require('include/footer.php');
?>