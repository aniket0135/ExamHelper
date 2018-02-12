<head>
   <meta http-equiv="X-UA-compatible" Content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

     
    <link  rel="stylesheet" type="text/css" href="../../../Bootstrap/css/bootstrap.min.css">  
  <link  rel="stylesheet" type="text/css" href="../../../css/index_new.css">
       <script type="text/javascript" src="../../../Bootstrap/js/jquery.js"></script>  
        <script type="text/javascript" src="../../../Bootstrap/js/bootstrap.js"></script>
      <link  rel="stylesheet" type="text/css" href="../../../css/lightbox.css">
                <script type="text/javascript" src="../../../Bootstrap/js/lightbox-plus-jquery.min.js"></script>
<title>Images Gallery</title>
</head>
<style>
    
    .thumbnail
    {
      
           
    }
 .thumbnail a
    {
       float: left;
           width:25%;
        height:90px;
    }
@media(max-width:640px)
{
    .thumbnail
    {
      float: left;
           
    }
    .thumbnail a
    {
        margin-left: 10px;
        float: left;width: 100px; height: auto; !important;
    }
 }
    .note
    {
        margin-left: 20px;
        color: red;
    }
      .no_image
    {
        margin-top: 100px;
        opacity: 0.1;
    }
</style>
<?php
require('../../../php_include/header.php');
?>
  <div class="note"><h4>Note:</h4><h5>Click on the image to view, Outside to close,</h5><h5>Click on download button to download.</h5></div>
  <?php
  $query1 = mysqli_query($conn, "select * FROM ".$prefix."images WHERE img_active=1");
  
while($row4 = mysqli_fetch_array($query1))
{

    //echo '<pre>',print_r($row4),'</pre>';
    $img_names[] = $row4['img_filename'];


}

//echo '<pre>',print_r($img_names),'</pre>';

   $my_images_arr=scandir("images");
//echo '<pre>',print_r($my_images_arr);s
$img_string="";
    $count=0;


    
foreach($my_images_arr as $image_name)
{
    $count++;
//echo '<pre>',print_r($image_name),'</pre>';

   if(in_array($image_name,$img_names))
    {
    if(strlen($image_name) > 2)
    {
        //echo '<pre>',print_r($image_name),'</pre>';
 ?>
  <div class="col-sm-2 col-xl-1 col-xs-4 thumbnail group">      
   <a href="images/<?php echo $image_name;?> " data-lightbox="gallery" title="View the Image"><img style="" src="images/<?php echo $image_name;?>"></a>
      <a style="Color:#2fae09;" href="images/<?php echo $image_name;?> "download title="Download">Download</a><br>
   </div>


<?php
    }
    }
}


    


if($count <= 2)
{?>

<h1 align="center" class="no_image">No Images to Show...</h1>
 <?php   
}
?>
   
    
       

       
              <?php
           //include "../../../../php_include/footer.php";
?>




