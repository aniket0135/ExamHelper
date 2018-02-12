<?php
require('include/header.php');


if (empty($user_name)) {
?>
	<table class="table" width="680">
		<tr class="table_header">
			<td>Acces Denied</td>
		</tr>
		<tr class="row1">
			<td>You are not logged in.</td>
		</tr>
	</table>
<?php
	//require('include/footer.php');
	die();
}
?>

<form action="upload.php" method="post" enctype="multipart/form-data">
	<table class="table" width="680">
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
				Name:
			</td>
			<td>
				<input name="img_name" size="15" type="text" id="img_name">   Same as File name..Please Tick<input name="tick" style="height:1em; background-color:black; color:red;" type="checkbox">
			</td>
		</tr>

		<!-- <tr class="row1">
			<td>
				Categorie:
			</td>
			<td>
					<?php
			/*$sql="SELECT cat_id, cat_name FROM ".$prefix."categories ORDER BY cat_name ASC";
			$result=mysqli_query($conn, $sql);
			$options="";
			while ($row=mysqli_fetch_array($result)) {
				$id=$row["cat_id"];
				$name=$row["cat_name"];
				$options.="<OPTION VALUE=\"$id\">".$name.'</option>';
			}*/
			?>
			<SELECT NAME=img_cat>
			<OPTION VALUE=0>Choose Categorie
			<?php //echo $options?>
                </OPTION>
			</SELECT><br>
			</td>
		</tr>
		-->

		<tr class="row1">
			<td valign="top">
				Description:
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
<br>




<?php
//echo $_POST['img_name'];
                
if (isset($_POST['submit']))
    
{

   if(!empty($_FILES["img_files"]["name"]))
   {
       //echo '<pre>',print_r($_FILES),'</pre>';
        //echo "Please Select Atleast one image";  

?>
                <table class="table" width="680">
                <tr class="table_header">
                <td>Upload Results</td>
                </tr>
                <tr class="row2">
                <td>
                <?php
/*
                $target_dir = "uploads/orginal/";
                $target_file = $target_dir . basename($_FILES["img_file"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) 
                {
                $check = getimagesize($_FILES["img_file"]["tmp_name"]);
                if($check !== false) 
                {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
                list($width, $height, $type, $attr) = getimagesize($_FILES["img_file"]["tmp_name"]);
                } 
                else 

                {
                echo "* File is not an image.<br>";
                $uploadOk = 0;
                }
                }


                // Check if the image width is smaller
                if ($width > $max_width) {
                echo "* Sorry, you have to upload a image smaller then ".$max_width."px width. Your file is ".$width." px width.<br>";
                $uploadOk = 0;
                }
                // Check if the image height is smaller
                if ($height > $max_height) {
                echo "* Sorry, you have to upload a image smaller then ".$max_height."px height. Your file is ".$height." px height.<br>";
                $uploadOk = 0;
                }
                // Check if the image width is bigger then 650
                if ($width < 650) {
                echo "* Sorry, you have to upload a image bigger then 650px width.<br>";
                $uploadOk = 0;
                }
                // Check if set a name to image name
                if (empty($_POST['img_name'])) {
                echo "* Sorry, you have to set a image name.<br>";
                $uploadOk = 0;
                }
                // Check if set a categorie
                if ($_POST['img_cat'] == '0') {
                echo "* Sorry, you have to set a categorie.<br>";
                $uploadOk = 0;
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                echo "* Sorry, filename already exists.<br>";
                $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["img_file"]["size"] > $max_filesize) {
                echo "* Sorry, your file is too large.<br>";
                $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "* Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                echo "<br>your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                if (move_uploaded_file($_FILES["img_file"]["tmp_name"], $target_file)) 
                    
                {
                $fname = basename( $_FILES["img_file"]["name"]);
                //$tmpname  = $src; 
                //@img_resize( $tmpname , 600 , "thumbs" , "album_".$id.".jpg"); 
                @img_resize( $target_file , $thumb_size , "uploads/thumbs" , $fname); 
                @img_resize( $target_file , $normal_size , "uploads" , $fname); 

                $now = date('Y-m-d');
                $userip = $_SERVER['REMOTE_ADDR'];
                $filesize = $_FILES["img_file"]["size"];
                $resolution = $width."x".$height;

                if ($user_level == '9') {
                $img_active = '1';
                } else {
                $img_active = '0';
                }

                $sql="INSERT INTO ".$prefix."images (img_name, img_cat, img_desc, img_date, img_uploader, img_upl_ip, img_filename, img_filesize, img_resolution, img_active) VALUES
                ('$_POST[img_name]', '$_POST[img_cat]', '$_POST[img_desc]', '$now', '$user_name', '$userip', '$fname', '$filesize', '$resolution', '$img_active')";
                if (!mysqli_query($conn, $sql)) {
                die('Error: ' . mysqli_error());
                }

                echo "<center><br>The file <b>". basename( $_FILES["img_file"]["name"]). "</b> has been uploaded.<center><br><br>";
                echo "<center><img src='uploads/".$fname."'></center>";
                }
                    
                else {
                echo "* Sorry, there was an error uploading your file.";
                }
                }
*/
       
       
       
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
            $target_dir="uploads/original/";
        $target_file=$target_dir . basename($file_name);
            //echo '<pre>',print_r($target_file),'</pre';
            
            
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
    

            
           // Check if the image width is smaller
                /*if ($width > $max_width) {
                echo "* Sorry, you have to upload a image smaller then ".$max_width."px width. Your file is ".$width." px width.<br>";
                $uploadOk = 0;
                }
                // Check if the image height is smaller
                if ($height > $max_height) {
                echo "* Sorry, you have to upload a image smaller then ".$max_height."px height. Your file is ".$height." px height.<br>";
                $uploadOk = 0;
                }
                // Check if the image width is bigger then 650
                if ($width < 650) {
                echo "* Sorry, you have to upload a image bigger then 650px width.<br>";
                $uploadOk = 0;
                }
                // Check if set a name to image name
                if (empty($_POST['img_name'])) {
                echo "* Sorry, you have to set a image name.<br>";
                $uploadOk = 0;
                }
                // Check if set a categorie
                if ($_POST['img_cat'] == '0') {
                echo "* Sorry, you have to set a categorie.<br>";
                $uploadOk = 0;
                }*/
           
        
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
                 
                           $fname = basename($file_name);
                //$tmpname  = $src; 
                //@img_resize( $tmpname , 600 , "thumbs" , "album_".$id.".jpg"); 
                @img_resize( $target_file , $thumb_size , "uploads/thumbs" , $fname); 
               // @img_resize( $target_file , $normal_size , "uploads" , $fname); 

                $now = date('Y-m-d');
                $userip = $_SERVER['REMOTE_ADDR'];
                //$filesize = $_FILES["img_files"]["size"];
                //$resolution = $width."x".$height;

                if ($user_level == '9') {
                $img_active = '1';
                } else {
                $img_active = '0';
                }

                $sql="INSERT INTO ".$prefix."images (img_name, img_desc, img_date, img_uploader, img_upl_ip, img_filename, img_filesize, img_active,target_dir) VALUES
                ('$_POST[img_name]', '$_POST[img_desc]', '$now', '$user_name', '$userip', '$fname', '$file_size', '$img_active','$target_dir')";
                if (!mysqli_query($conn, $sql)) {
                die('Error: ' . mysqli_error());
                }

                echo "<center><br>The file <b>". basename( $file_name). "</b> has been uploaded.<center><br><br>";
                echo "<center><img src='uploads/".$fname."'></center>";
                  
                    
                } 
                else
                {
                    echo "Sorry, there was an error uploading your file.";
                    echo "<br />";
                }
            }
        
        
        
    }
    echo "<br/>";
    echo "$file_name";
       

                ?>
                </td>
                </tr>
                </table>
                <?php


   }
else
    {
        echo "Please Select atleast one image";
    }
       
}
    
//require('include/footer.php');
?>