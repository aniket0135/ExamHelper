<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8"> <meta http-equiv="X-UA-compatible" Content="IE-edge">
  <link  rel="stylesheet" type="text/css" href="/Bootstrap/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

   <style>
        .sem {
    background-color:#404044;
    background-size: cover;
        margin: 50px;
      list-style: none;
    display:block;
    width: 200px;
    text-decoration:none;

    text-align: center;
    }
.sem a
    {
        color: white;
        font-size: 20px;
         width: 200px;
        display: block;
        text-align: center;
        text-decoration:none;
        border-style:solid;
        font-weight: 700;
    }
.sem:hover a{
    transition: font-size .5s;
    font-size:30px;
    color:#a3a3ea;
    text-decoration:none;
}
       .bg
       {
           background-color: cadetblue;
       }
    </style>

<body class="bg">
   <div class="container pull-right">
          <div class="row">
            <div class="col-sm-6">
                <li class="sem"><a href="Mid_Sem/Browse.php">Mid Sem</a></li>
            </div>
            <div class="col-sm-6">
                 <li class="sem"><a href="End_Sem/Browse.php">End Sem</a></li>
            </div>
       </div>
    </div>
    <?php
    echo"<br/>"; echo"<br/>"; echo"<br/>"; echo"<br/>"; echo"<br/>"; echo"<br/>"; echo"<br/>";
     echo"<br/>"; echo"<br/>"; echo"<br/>"; echo"<br/>"; echo"<br/>"; echo"<br/>";
           include ("../../../../../../php_include/footer.php");
?>
    
</body>
</html>
