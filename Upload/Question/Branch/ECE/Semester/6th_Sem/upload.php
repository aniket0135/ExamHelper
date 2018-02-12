<html>
  <head>
   <meta http-equiv="X-UA-compatible" Content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link  rel="stylesheet" type="text/css" href="../../../../../Bootstrap/css/bootstrap.min.css">  
  <link  rel="stylesheet" type="text/css" href="../../../../../css/index_new.css">
       <script type="text/javascript" src="../../../../../Bootstrap/js/jquery.js"></script>  
        <script type="text/javascript" src="../../../../../Bootstrap/js/bootstrap.js"></script>
</head>
<?php
require('../../../../../php_include/header.php');
?>
<style>
    .upload_image
    {
        margin-top: 80px;
        margin-left: 10px;
        width: 800px;
    }
@media(max-width:640px)
{
    .upload_image{width:600px;!important;}
    }
        
table.table {
	border: 1px #D0D0D0 solid;
	 
	border-collapse: collapse;
}

tr.table_header {
	background-color: #D0D0D0;
	color: #000000;
}

tr.row1 {
	background-color: #DFDEDB;
}

tr.row2 {
	background-color: #E8E8E8;
}

tr.row3 {
	background-color: #CCCCCC;
}


td.cell_content {
	background-color: #DFDEDB;
}

    </style>


<form action="upload.php" method="post" enctype="multipart/form-data">
	<table class="table upload_image">
		<tr class="table_header">
			<td colspan="2">Upload Image</td>
		</tr>

		<tr class="row1">
			<td>
				Image:
			</td>
			<td>
				<input type="file" name="img_files[]" id="img_file" multiple>
			</td>
		</tr>

		<tr class="row1">
			<td>
				Name: (Optional)
			</td>
			<td>
				<input name="img_name" size="15" type="text" id="img_name">
			</td>
		</tr>

		<tr class="row1">
			<td valign="top">
				Description: (Optional)
			</td>
			<td>
				<textarea rows="7" name="img_desc" cols="40"></textarea>
			</td>
		</tr>

		<tr class="row3">
			<td colspan="2"><center><input type="submit" value="Upload Image" name="submit"></center></td>
		</tr>
	</table>
</form>
</html>


<?php
          if(isset($_POST["submit"]))
{  
    ?>

                <table class="table" width="580px">
                <tr class="table_header">
                <td>Upload Results</td>
                </tr>
                <tr class="row2">
                    </tr>
    </table>
        <?php
            if(!empty($_FILES["files"]))
            {
               // echo'<pre>',print_r($_FILES);
            }
      if(isset($_POST["submit"]))
{  
        $allowable_extension=array('jpg','png','jpeg','gif');
        
         $upload_OK=1;
    
        foreach($_FILES["img_files"]["name"] as $position=>$name)
    {
            $file_name=$_FILES["img_files"]["name"][$position];
            $file_type=$_FILES["img_files"]["type"][$position];
            $file_tmp_name=$_FILES["img_files"]["tmp_name"][$position];
            //echo '<pre>',print_r($file_name),'</pre>';
            $file_error=$_FILES["img_files"]["error"][$position];
            $file_size=$_FILES["img_files"]["size"][$position];
            $target_dir="images/";
        $target_file=$target_dir . basename($file_name);
            
            $uploaded_dir = "../Upload/Question/Branch/ECE/Semester/6th_Sem/images/";
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
         if(filesize($file_tmp_name)>=$max_filesize)
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
                    $fname = basename($file_name);
                    $now = date('Y-m-d');
                $userip = $_SERVER['REMOTE_ADDR'];
                    if ($user_level == '9') 
                    {
                        $img_active = '1';
                        } 
                    else {
                        $img_active = '0';
                        }
                    $sql="INSERT INTO ".$prefix."images (img_date, img_upl_ip, img_filename, img_filesize,img_active,uploaded_dir) VALUES
                ('$now','$userip', '$fname', '$file_size', '$img_active','$uploaded_dir')";
                if (!mysqli_query($conn, $sql)) {
                die('Error: ' . mysqli_error());
                }
                    
                } 
                else
                {
                    echo "Sorry, there was an error uploading your file.";
                    echo "<br />";
                }
            }
    }
}
          }
        
    //include("../../../../php_include/footer.php");

        ?>
