<?php include 'skripta.php';
    include 'unos.php';
    include 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <meta name="description" content="Projekt iz predmeta Programiranje web aplikacija">
        <meta name="keywords" content="programiranje, web, aplikacije, servisi">
        <meta name="author" content="Bruno Brašić">

        <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <div id="wrapper">

    <header>
        <h1 class="fleft logo"></h1>  
        <div class="clearfix"></div>
        <div id="header2">
            <nav class="navigacija">
                        <ul>
                        <li><a href="index.html">Početna</a></li>
                                <li><a href="kategorija.php">Kategorije</a></li>
                                <li><a href="clanak.html">Clanak</a></li>
                                <li><a href="unos.html">Unos</a></li>
                                <li><a href="administrator.php">Administrator</a></li>
                                <li><a href="login.html">Prijava</a></li>
                                <li><a href="registracija.html">Registracija</a></li>
                        </ul>
            
                </nav>
                <div class="clearfix"></div>    
                <hr>


        </div>

    </header>
    
    <div class="clearfix"></div>
    
    <div id="content_wrap">
        <div id="content">
                
                    <?php include 'skripta.php';?>
                    <section role="main">
                        <div class="row">
                            <h2 ><?php 
                                echo "<span>".$row['kategorija']."</span>";
                                 ?></h2>
                                <h1><?php
                                     echo $row['naslov'];
                                      ?></h1>
                                <p>AUTOR:</p>
                                <p>OBJAVLJENO: <?php
                                     echo "<span>".$row['datum']."</span>";
                                      ?></p>
                        </div> 
                        

                         <section > 
                            <p>
                                  <?php echo "<i>".$row['sazetak']."</i>";
                                   ?> 
                            </p> 
                        </section> 
                        <section >
                             <p> 
                                 <?php echo $row['sadrzaj']; ?> 
                                </p>
                        </section> 
                    </section>
                    <div class="clearfix"></div>
                   
                   


        </div>
        
    </div>

    


    
    </div><!--kraj id wrapper-->
    <div class="clearfix"></div>
    <footer>
        <h3 class="fleft logoFooter"></h3> 
        <p>Bruno Brašić | bbrasic@tvz.hr | 2019.godina</p>
        
    </footer>

    <div class="clearfix"></div>
</body>

</html>