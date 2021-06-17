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
                    
<main>



<?php 

            
    $localhost = "localhost";
    $user = "root";
    $pass = "";
    $baza = "pwa";        
    $dbc = mysqli_connect($localhost,$user,$pass,$baza) or die("nisam se spojio ");
    
    $ime = $_POST['username'];
    
    if(isset($_POST['username'])){
        $ime = $_POST['username'];
    }

    if(isset($_POST['password'])){
        $pass1 = $_POST['password'];
    }

    $sql = "SELECT * FROM users where users.korisnicko_ime = '$ime'";
    
    $result = mysqli_query($dbc,$sql)or die ("error");


    while($row = mysqli_fetch_array($result)){
        if(password_verify($_POST['password'],$row['lozinka'])){
            echo "Prijava je uspješna";
        }else{
            echo "Upisali ste pogrešno korisničko ime ili lozinku";
        }   
    }

        
        ?>
    </main>
                
                    <div class="clearfix"></div>


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
