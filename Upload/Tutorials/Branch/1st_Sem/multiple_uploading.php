<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Multiple File Upload</title>
    </head>
<style>
#form
    {
        background-color:#87b1ed;
    }
.upload
    {
         margin-left:500px;
        font-size: 30px;
        height: 70px;
        background-color:#f1b0b0;
    }
.choose
    {
       margin: 80px;
        font-size: 20px;
    }
    
</style>
    <body id="form">
        <form class="form" action="multiple_upload.php" method="post" enctype="multipart/form-data">
            
            <input class="choose" type="file" name="files[]" multiple>
            <input class="upload" type="submit" value="Upload" name="submit">
        </form>
  <?php
    include("../../../../php_include/footer.php");
?>
    </body>
</html>