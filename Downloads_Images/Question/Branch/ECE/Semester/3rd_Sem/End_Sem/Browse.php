<?php
    $my_images_arr=scandir("images");
//echo '<pre>',print_r($my_images_arr);
$img_string="";
foreach($my_images_arr as $image_name)
{
    if(strlen($image_name) > 2)
    {
        
   
    $img_string .= '<img src="images/'.$image_name.'">';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Images Gallery</title>
        <style type="text/css">
        
           #browse
            {
                background-color: #e1dfdf;
            }
         #gHolder
            {
                width:860px;
                height:600px;
                background-color: silver;
                padding:10px;
            }
            #theBigImageHolder
            {
                width: 860px;
                height: 600px;
                background-color: #9e9898;
            }
            #thumbnailsHolder 
            {
                width:400px;
                height:500px;
                background-color: #b68080;
               margin-left: 900px;
                margin-top:-600px;
                padding: 5px;
                overflow: auto;
            }
            #theBigImageHolder > img
            {
                width:860px;
                height:600px;
            }
            #thumbnailsHolder > img
            {
                height: 90px;
                width:90px;
                display:block;
                float:left;
                margin:2px;
                transition: border-radius 0.3s linear 0s;
            }
            #thumbnailsHolder > img:hover
            {
                border-radius: 25px;
                border-bottom-color: black;
                cursor: pointer; 
            }
            #ins
            {
                margin-left: 950px;
                font-size: 20px;
                color: #8e7f7f;
                margin-top:-50px;
            }
        
        </style>
        <script type="text/javascript">
            function imgFunc()
            {
                var bigImage = document.getElementById("bigImage");
                var thumbnailsHolder = document.getElementById("thumbnailsHolder");
                
                thumbnailsHolder.addEventListener("click",function(event)
                            {
                    if(event.target.tagName == "IMG")
                        {
                            bigImage.src = event.target.src;
                        }
                },false);
            }
            window.addEventListener("load",imgFunc,false);
        </script>
    </head>
    
    <body id="browse">
        <div id="gHolder">
            <div id="theBigImageHolder">
                <?php
                echo '<img scr="images/'.$my_images_arr[0].'" id="bigImage">';
                ?>
            </div>
            <div id="thumbnailsHolder">
                <?php
                echo $img_string;
                ?>
                
            </div>
            
        </div>
        <p id="ins">Click On Thumbnail to View Image</p>
              <?php
           include "../../../../../../../php_include/footer.php";
?>
    </body>
</html>