
<!DOCTYPE html>
<html>
    <head>
        <title>Exam Helper</title>
        <meta http-equiv="X-UA-compatible" Content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link  rel="stylesheet" type="text/css" href="css/index_new.css">
         <link  rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.min.css">
    </head>
    
<body id="back_ground">  
    <?php
    require"php_include/header.php";
    ?>
    <!--end of logo and navigation-->
    
    
    
    <!--*************For Uploads**********-->
    <div class="container upload_download" style="">
        <div class="row" style="">
        
           <div class="col-sm-3">
           </div>
           <div class="col-sm-3"></div>
           
           <div class="col-sm-3 col-xs-6"><div class="dropdown_uploads">
                <button onclick="Uploads_Function()" class="Uploads">Uploads</button>
                <div id ="myUploads" class="Uploads_content">
                    <a href="Upload/Question/Branch/branch.php">Questions</a>
                    <a href="Site_Under_Construction.php">Tutorials</a>
                </div>
            </div></div>
           
         
            
            
    <!--*************For Downloads**********-->
           
           <div class="col-sm-3 col-xs-6">
           <div class="dropdown_downloads">
             <button onclick="Downloads_Function()" class="Downloads">Downloads</button>
            <div id="myDownloads" class="Downloads_content">
                <a href="Downloads_Images/Question/Branch/branch.php">Questions</a>
                <a href="Site_Under_Construction.php">Tutorials</a>
            </div>
            </div>
            </div> 
            
        </div>
    
        
<form action="php_include/checklogin.php" method="post">
  &nbsp;
   <div class="col-sm-3 col-xs-6" style="border:2px solid; width:200px; height:130px; background-color:lightblue; border-radius:6px; margin-top:70px;">
      &nbsp;
       <div align="center" class="row">
       <input style name="username" type="text" placeholder="Username">
       </div>
       <div align="center" class="row">
       <p></p>
       <input name="password" type="password" placeholder="Password">
       </div>
       <div align="center" class="row">
       <p></p>
       <input style="background-color:#8d82ec; font-weight:700;" name="login" type="submit" value="Login">
       </div>
   </div>
    
</form>
       
              <?php
       
if (isset($_GET['login']))
{
    if ($_GET['login'] == "fail")
    {
?>
<div class="col-sm-3 col-xs-3">
<p class="incorrect" style="color:red; margin-left:-16em; margin-top:13em; font-weight:600;">Incorrect Username OR Password!</p>
</div>
<br><br>
<?php }
 elseif ($_GET['login'] == "true")
        
 {
     //echo "Hello "." $first_name "." $last_name";
 }
}
?>
       
        <!-----content area---->
   <div class="container content">
      <div class="col-sm-6 paragraph">
       <fieldset class="" style="border:0px solid;">
        <p ><span class="welcome">Welcome,</span><br>Please Help us To Help Others!!!
    <br>
    Please Upload Questions &amp; Tutorials of Previous Years.</p>
    </fieldset>
       </div>
       
       <div class="col-sm-6"></div>
   </div>
       <!--<div class="row">
            <fieldset class="paragraph" style="border:0px solid; width:400px;">
        <p ><span class="welcome">Welcome,</span><br>Please Help us To Help Others!!!
    <br>
    Please Upload Questions &amp; Tutorials of Previous Years.</p>
    </fieldset>
       </div>-->
     <div class="container fb">
        <div class="fb-like" data-href="https://www.facebook.com/examhelper.mnnit/" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
        </div>
    
<?php
           include "php_include/footer.php";
?>
   
        
    </body>
</html>