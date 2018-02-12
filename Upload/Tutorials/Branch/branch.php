<html>
    <head>
        <title>Branch</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
                 <link  rel="stylesheet" type="text/css" href="../../../css/footer.css">
                         <meta name="viewport" content="width=device-width">
         <link  rel="stylesheet" type="text/css" href="../../../Bootstrap/css/bootstrap.css">


    </head>
    <style>
        .body
{

    background-color:  #847e7a;
}
         .branch
        {
            margin: 0;
        }
        .row
        {
            width:100%;
        }
        .col-sm-3 ul
        {
            list-style: none;
        }
        .col-sm-3 ul li
        {
               margin-top:20px; 
            margin-left: 20px;
            line-height: 150px;
            height: 150px;
            width: 250px;
            border-radius: 15px;
            
        }
        .col-sm-3 ul li a
        { 
            text-align: center;
            width: 250px;
            height: 150px;
            display: block;
            text-decoration: none;
            font-size: 40px;
            font-weight: 700;
            border-radius: 15px;
        }
    .col-sm-3 ul li:hover a
        {
            transition: font-size 0.4s;
            font-size: 45px;
        }
        
        
     .sem {
            background-color: #8dbcdc;
            
    }
.sem a
    {
        color: black;
        font-size: 20px;
        display: block;
        height: 120px;
        text-align: center;
        text-decoration:none;
        border-style:solid;
        border-radius: 70px 70px 70px 70px;
        font-weight: 700;
    }
.sem:hover a{
    transition: font-size .5s;
    font-size:30px;
    color:#0e44d6;
    text-decoration:none;
}
/**********Bio.Tech**********/        
 .Bio
{
    background-image: url(../../../images/Bio-Tech.jpg);
    background-size: cover;
}
.Bio a
{
    color:brown;
}
/**********Chemical*******/
.Che
{
    background-image: url(../../../images/chemical.jpg);
    background-size: cover;
}
.Che a
{
    color:#2d62eb;
}
/**********Civil*******/
.Civ
{
    background-image: url(../../../images/Civil.jpg);
    background-size: cover;
}
.Civ a
{
    color:#fcfcfc;
}
/*********CS**********/
.CS
{
    background-image: url(../../../images/Computer%20Science.jpg);
    background-size: cover;
}
.CS a
{
    color:#6f0da0;
}
/*********ECE*********/
.ECE
{
    background-image: url(../../../images/img-ece.jpg);
    background-size: cover;
}
.ECE a
{
    color: white;
}

.ECE:hover a
        {
            color:#9e9ea7;
        }
/*********Electrical***********/
.Electrical
{
    background-image: url(../../../images/electrical_engineering.jpg);
    background-size: cover;
}
.Electrical a
{
    color:black;
}
/***********IT***************/
.IT
{
     background-image: url(../../../images/IT.jpg);
    background-size: cover;
}
.IT a
{
    color:#ec0808;
}
      
/*********Mech***************/  
.Mech
{
     background-image: url(../../../images/Mechanical-Engineering.jpg);
    background-size: cover;
}
.Mech a
{
    color:#11154a;
}
/**********Production*********/
.Prod
{
     background-image: url(../../../images/Production-engineering.jpg);
    background-size: cover;
}
.Prod a
{
    color:#2815d5;
}

    </style>

    <body class="body">
        <header class="container branch">
            <div class="row">
                <div class="col-sm-3">
                    <ul >
                        <li class="Bio">
                            <a href="Bio.Tech/Semester/sem.php">Bio.Tech</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3">
                <ul>
                    <li class="Che">
                         <a  href="Chemical/Semester/sem.php">Chemical</a>
                    </li>
                </ul>
                </div>
                <div class="col-sm-3">
                <ul>
                    <li class="Civ">
                         <a href="Civil/Semester/sem.php">Civil</a>
                    </li>
                </ul>
                </div>
                 
                <div class="col-sm-3">
                <ul>
                 <li class="sem"><a href="1st_Sem/multiple_uploading.php">1<sup>st</sup> Sem</a></li>
                 </ul>
            </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                <ul>
                    <li class="CS">
                         <a href="CS/Semester/sem.php">CS</a>
                    </li>
                </ul>
                </div>             
                <div class="col-sm-3">
                <ul>
                    <li class="ECE">
                         <a href="ECE/Semester/sem.php">ECE</a>
                    </li>
                </ul>
                </div>
                <div class="col-sm-3">
                <ul>
                    <li class="Electrical">
                         <a href="Electrical/Semester/sem.php">Electrical</a>
                    </li>
                </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                <ul>
                    <li class="IT">
                         <a href="IT/Semester/sem.php">IT</a>
                    </li>
                </ul>
                </div>
    
                <div class="col-sm-3">
                <ul>
                    <li class="Mech">
                         <a href="Mechanical/Semester/sem.php">Mech</a>
                    </li>
                </ul>
                </div>        
                <div class="col-sm-3">
                <ul>
                    <li class="Prod">
                          <a href="PIE/Semester/sem.php">PIE</a>
                    </li>
                </ul>
                </div>
                <div class="col-sm-3">
                <ul>
                 <li class="sem"><a href="2nd_Sem/multiple_uploading.php">2<sup>nd</sup> Sem</a></li>
                    </ul>
            </div>
            </div>
               
   </header>
 <?php
           include ("../../../php_include/footer.php");
?>
     
    </body>
</html>