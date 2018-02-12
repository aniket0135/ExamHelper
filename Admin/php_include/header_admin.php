<?php
require('../config.php');
include("../include/functions.php");

//mysqli_connect("$host", "$username", "$password")or die("cannot connect to the database."); 
//mysqli_select_db($conn, "$db_name")or die("cannot select the database.");

$result = mysqli_query($conn, "SELECT * FROM ".$prefix."settings WHERE id = 1");
while($row = mysqli_fetch_array($result)) {
	$pagename = $row['pagename'];
	$template = $row['template'];
}



session_start();
if ($_SESSION['loggedIn'] != "true") {
	header("Location: ../index.php");
} else {
	$user_name = $_SESSION['username'];
	$user_level = $_SESSION['userlevel'];
	if ($user_level < 9) {
		header("Location: ../index.php");
	}
}


?>

<html>

<head>
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv="X-UA-compatible" Content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $pagename; ?> - Admin Panel</title>
  <link  rel="stylesheet" type="text/css" href="../Bootstrap/css/bootstrap.css">
    <link  rel="stylesheet" type="text/css" href="../css/index_new.css"> 
     <script type="text/javascript" src="../Bootstrap/js/jquery.js"></script>  
        <script type="text/javascript" src="../Bootstrap/js/bootstrap.js"></script>
<?php
echo "<link href='../template/$template' rel='stylesheet' type='text/css' />";
?>
</head>

<body>
<div class="container-fluid" style="">
       <div class="row" style="">
       <div class="col-sm-5" style="">
       <h1>Exam Helper</h1>
       </div>
<div align="center">
	<table border="0" width="1024" cellspacing="0" cellpadding="0">
		<tr>
			<td valign="top" colspan="2" width="1024">
			<p align="center"><b><font size="6"><?php echo $pagename; ?></font></b><font size="5"><br>
			admin panel</font><br><br></td>
		</tr>
			
       <div class="col-sm-7 my_menu">
          
          
          <nav class="navbar navbar-inverse  pull-right">
          
          
          <div class="navbar-header ">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
                  <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
              </button>
          </div><!---button-->
          
          
          <div class="collapse navbar-collapse" id="mynavbar">
           <ul class="nav navbar-nav pull-right ">
               <li><a href="index.php">Admin Home</a></li>
               <li><a href="../index.php">Main Website</a></li>
               <li><a href="not_active.php">Image Not active</a></li>
               <li><a href="member_list.php">Members</a></li>
               <li><a href="settings_edit.php?settings=1">Edit Settings</a></li>
              <?php
               if(isset($_SESSION['loggedIn']))
                {
    
                    if($_SESSION['loggedIn'] =="true")
                    {?>
                        <li><a href="logout.php">Logout</a></li>
                    
                    <?php
                     if($user_level == 9)
                     {?>
                         <li><a href="#"></a></li>
                     
                    <?php }?>
                    
                    
                    <?php
                     if($user_level == 1)
                     {?>
                         <li><a href="#"><?php echo "$first_name "." $last_name";?></a></li>
                     
                    <?php }?>
                    
                   <?php }
                   
                   else {?>
                   <li><a style="" href="../Register.php">Register</a></li>
                   <li><a style="" href="../index.php">Login</a></li>
                <?php }
               
               }
                   
               else {?>
                   <li><a style="" href="../Register.php">Register</a></li>
                    <li><a style="" href="../index.php">Login</a></li>
                <?php }
               
               ?>
           </ul>
           
           </div>
           </nav>
           </div>