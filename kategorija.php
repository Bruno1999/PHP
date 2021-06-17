<?php include 'connect.php';
         define('UPLPATH', 'img/'); 
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
       
        <section class="tehnologija"> 
            <?php
            $query = "SELECT * FROM vijesti WHERE kategorija=$kategorija";
            $result = mysqli_query($dbc, $query);
            $i=0;
            while($row = mysqli_fetch_array($result)) { 
                echo '<article>';
                echo'<div class="article">';
                echo '<div class="sport_img">';
                echo '<img src="' . UPLPATH . $row['slika'] . '"'; 
                echo '</div>';
                echo '<div class="media_body">'; 
                echo '<h4 class="title">';
                echo '<a href="clanak.php?id='.$row['id'].'">'; 
                echo $row['naslov']; 
                echo '</a></h4>';
                echo '</div></div>';
                echo '</article>';
            
            }
                ?> 
            </section>
            
            

           
        </div>
    </div>

    


    
    </div><!--kraj id wrapper-->
    <div class="clearfix"></div>
    <footer>
        
        <p>Bruno Brašić | bbrasic@tvz.hr | 2019.godina</p>
        
    </footer>

    <div class="clearfix"></div>
</body>

</html>