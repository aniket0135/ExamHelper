<?php 
require('php_include/header.php');
session_destroy();
header("Refresh:0.2;index.php");
?>
<html>
    <head>
        <title>Logout</title>
    </head>
</html>
<div style="margin-left:50px;
margin-top:50px;">
<tr class='table_header'>
		<h4>Login Status:</h4>
	</tr>
	<tr class='row1'>
		<h5>You are succesfully logged out.</h5>
	</tr>
</div>
