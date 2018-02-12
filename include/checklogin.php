<?php
// checkLogin.php

session_start(); // Start a new session
require('../config.php'); // Holds all of our database connection information

//mysqli_connect("$host", "$username", "$password")or die("cannot connect to the database."); 
//mysqli_select_db("$db_name")or die("cannot select the database.");

$result = mysqli_query($conn, "SELECT * FROM ".$prefix."settings WHERE id = 1");
while($row = mysqli_fetch_array($result)) {
	$pagename = $row['pagename'];
	$template = $row['template'];
}

// Get the data passed from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Do some basic sanitizing
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$passwordFromPost = mysql_real_escape_string($password);

$sql = "select * from ".$prefix."users where username = '$username' and password = '$password'";
$result = mysqli_query($conn, $sql) or die ( mysql_error() );

$count = 0;

//while ($line = mysqli_fetch_assoc($result)) {
	$result = mysqli_query($conn, "SELECT * FROM ".$prefix."users WHERE username = '$username'");
	$row = mysqli_fetch_array($result);
        
        //echo '<pre>',print_r($result),'</pre>';
		$user_level = $row['user_level'];
		$user_name = $row['username'];
        $hashedPasswordFromDB=$row['password'];
		$user_id = $row['id'];

	if ($user_level > 0) {
        if (password_verify($passwordFromPost, $hashedPasswordFromDB))
        {
        
		$count++;
        }
	}






/*
   $username=$_POST['username'];
        
        $passwordFromPost = $_POST['password'];

        $user = "SELECT * FROM user WHERE username='$username'";
        $result_user = mysqli_query($conn, $user);
        //echo'<pre>',print_r($result_user),'</pre>';
        
        $row=mysqli_fetch_assoc($result_user);
        $user_level=$row['user_level'];
        $hashedPasswordFromDB=$row['password'];
        
        if (password_verify($passwordFromPost, $hashedPasswordFromDB)) 
            {
                echo 'Password is valid!';

                 if($user_level == 9)
                    {
                        echo "you are admin";
                    }
                    else
                    {
                        echo "hello user";
                    }

            } 
        else
        {
            echo 'Username or Password is incorrect';
        }
        //echo'<pre>',print_r($row),'</pre>';
       
*/







if ($count == 1) {
	$_SESSION['username'] = $user_name;
	$_SESSION['userlevel'] = $user_level;
	$_SESSION['userid'] = $user_id;
	$_SESSION['loggedIn'] = "true";
	 header("Location: ../index.php"); // This is wherever you want to redirect the user to
} else {
	$_SESSION['loggedIn'] = "false";
	header("Location: ../index.php?login=fail"); // Wherever you want the user to go when they fail the login
}

?>
