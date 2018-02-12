  <?php
include "config.php";
session_start();
$userip=$_SERVER['REMOTE_ADDR'];
$user_level = 0;


$result = mysqli_query($conn, "SELECT * FROM ".$prefix."settings WHERE id = 1");
while($row = mysqli_fetch_array($result)) {
	$pagename = $row['pagename'];
	$slogan = $row['slogan'];
	$template = $row['template'];
	$hitcounter = $row['hitcounter'];
	$hitcounterimg = $row['hitcounterimg'];
	$installed = $row['installed'];
	$script_url = $row['script_url'];
	$max_filesize = $row['max_filesize'];
	$max_width = $row['max_width'];
	$max_height = $row['max_height'];
	$thumb_size = $row['thumb_size'];
	$normal_size = $row['normal_size'];
	$thumb_cells = $row['thumb_cells'];
	$thumb_rows = $row['thumb_rows'];
	$search_suggestions = $row['search_suggestions'];
}

?>
 
 <?php       
       
if(isset($_SESSION['loggedIn']) != "true") 
{
	//header("Location: login.php");
}
if(isset($_SESSION['loggedIn']))
{
    
if($_SESSION['loggedIn'] =="true")
{

	$user_name = $_SESSION['username'];
	$user_id = $_SESSION['userid'];
	$user_level = $_SESSION['userlevel'];
	$result = mysqli_query($conn, "SELECT * FROM ".$prefix."users WHERE username = '$user_name'");
	$row = mysqli_fetch_array($result);
    //echo '<pre>',print_r($row),'</pre>';
    $first_name=$row['first_name'];
    $last_name=$row['last_name'];
    
    //echo "Hello"." $first_name "." $last_name";
	//while($row = mysqli_fetch_array($result)) {
		//$user_id = $row['id'];
		//$user_level = $row['user_level'];
		//$user_name = $row['username'];
		//echo "yesy";
    //echo "$user_name";
	//}
}
}
    
?>
<html>
<head>
   <meta http-equiv="X-UA-compatible" Content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link  rel="stylesheet" type="text/css" href="../../Bootstrap/css/bootstrap.css">  
  <link  rel="stylesheet" type="text/css" href="../../css/index_new.css">  
</head>
<body>
 <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function Uploads_Function() {
    document.getElementById("myUploads").classList.toggle("view");



window.onclick = function(event) {
  if (!event.target.matches('.Uploads')) {

    var uploads = document.getElementsByClassName("Uploads_content");
    var i;
    for (i = 0; i < uploads.length; i++) {
      var openDropdown = uploads[i];
      if (openDropdown.classList.contains('view')) {
        openDropdown.classList.remove('view');
      }
    }
  }
}
}
// function for Downloads
function Downloads_Function() {
    document.getElementById("myDownloads").classList.toggle("show");

    window.onclick = function(event) {
  if (!event.target.matches('.Downloads')) {

    var downloads = document.getElementsByClassName("Downloads_content");
    var j;
    for (j = 0; j < downloads.length; j++) {
      var openDropdown = downloads[j];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
}
</script>

  
  
                 

                  <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            
             <script type="text/javascript" src="Bootstrap/js/jquery.js"></script>  
        <script type="text/javascript" src="Bootstrap/js/bootstrap.js"></script> 
            
<!--<header class="container-fluid top_bar">
    <div class="container" style="">
        <div class="row contact_info" >
            <div class="col-sm-3"></div>
        <div class="col-sm-9 text-right">
        <span class="glyphicon glyphicon-envelope"> studytime@yahoo.com</span>
    </div>
      </div>
    </div>
      </header>-->
      
      
     <!--logo and navigation-->
       <div class="container-fluid" style="">
       <div class="row" style="">
       <div class="col-sm-5" style="">
       <h1>Exam Helper</h1>
       </div>
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
               <li><a href="/examhelper/index.php">Home</a></li>
               <li><a href="/examhelper/Notice.php">News / Notice</a></li>
               <li><a href="/examhelper/Contact.php">Contact Us</a></li>
               <li><a href="/examhelper/About_Us.php">About Us</a></li>
              <?php
               if(isset($_SESSION['loggedIn']))
                {
    
                    if($_SESSION['loggedIn'] =="true")
                    {?>
                        <li><a href="/examhelper/logout.php">Logout</a></li>
                    
                    <?php
                     if($user_level == 9)
                     {?>
                         <li><a href="/examhelper/Admin/index.php">Admin Pannel</a></li>
                     
                    <?php }?>
                    
                    
                    <?php
                     if($user_level == 1)
                     {?>
                         <li><a href="#"><?php echo "$first_name "." $last_name";?></a></li>
                     
                    <?php }?>
                    
                   <?php }
                   
                   else {?>
                   <li><a style="" href="/examhelper/Register.php">Register</a></li>
                <?php }
               
               }
                   
               else {?>
                   <li><a style="" href="/examhelper/Register.php">Register</a></li>
                   <li><a style="" href="/examhelper/index.php">Login</a></li>
                <?php }
               
               ?>
           </ul>
           
           </div>
           </nav>
           </div>
       </div>
        </div>
    </body>
</html>