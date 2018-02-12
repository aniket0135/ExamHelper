<html>
    <head>
        <title>Upload an Image</title>
    </head>
    <body>
        <?php
            if(!empty($_FILES["files"]))
            {
               // echo'<pre>',print_r($_FILES);
            }
      if(isset($_POST["submit"]))
{  
        $allowable_extension=array('jpg','png','jpeg','gif');
        
         $upload_OK=1;
    
        foreach($_FILES["files"]["name"] as $position=>$name)
    {
            $file_name=$_FILES["files"]["name"][$position];
            $file_type=$_FILES["files"]["type"][$position];
            $file_tmp_name=$_FILES["files"]["tmp_name"][$position];
            //echo '<pre>',print_r($file_name),'</pre>';
            $file_error=$_FILES["files"]["error"][$position];
            $file_size=$_FILES["files"]["size"][$position];
            $target_dir="../../../../../../Upload_Images/Tutorials/IT/4th_Sem/";
        $target_file=$target_dir . basename($file_name);
            
            
            $file_info=pathinfo($file_name);
       if(!empty($file_name))
       {
           $file_ext=$file_info['extension'];
            //echo '<pre>',print_r($file_info),'</pre>';
            if(!in_array($file_ext,$allowable_extension))
            {
                echo "Only Image Allowed:  $file_name";
                echo "<br />";
                $upload_OK=0;
            }
       
           if(!exif_imagetype($file_tmp_name))
            {
                echo "This is not an Image:  $file_name";
                echo "<br />";
                $upload_OK=0;
            }
         if(filesize($file_tmp_name)>=2097152)
            {
                echo "Your File is too Large:  $file_name";
                echo "<br />";
                $upload_OK=0;
            }
           /* if(!preg_match("`^[-0-9A-Z_\.]+$`i",$file_name))
            {
                echo "Please Change Your Name Of Image:  $file_name";
                echo "<br />";
                $upload_OK=0;
            }*/
            if(mb_strlen($file_name,"UTF-8")>225)
            {
                echo "Your Image file name is too large:  $file_name";
                echo "<br />";
                $upload_OK=0;
            }
    

        
        if (file_exists($target_file))
                {
                        echo "Sorry, file already exists.  $file_name";
                        $upload_OK = 0;
                        echo "<br />";
                }
       }
            
        if ($upload_OK == 0)
            {
                echo " Your file was not uploaded. $file_name";
                   echo "<br />";             

// if everything is ok, try to upload file
            }
        else
            {
                if (move_uploaded_file($file_tmp_name, $target_file)) 
                {
                    echo "The file ". basename( $file_name). " has been uploaded.";
                    echo "<br />";
                } 
                else
                {
                    echo "Sorry, there was an error uploading your file.";
                    echo "<br />";
                }
            }
    }
}
         include("../../../../../../php_include/footer.php");         ?>
    </body>
</html>