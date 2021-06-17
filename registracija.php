
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
                
        <section>
               
        </section>
                
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
<?php

$localhost = "localhost";
$user = "root";
$pass = "";
$baza = "pwa";

$dbc = mysqli_connect($localhost,$user,$pass,$baza)or
die ("error");

if(isset($_POST['registracija'])){
$ime = $_POST['username'];
$passK = $_POST['lozinkaKorisnika'];
$passP = $_POST['lozinkaKorisnika2'];
$dbc = mysqli_connect($localhost,$user,$pass,$baza);

$lozinkaK = $_POST['lozinkaKorisnika'];
$passK = password_hash($passK, CRYPT_BLOWFISH);
$sql = "INSERT INTO users ( korisnicko_ime, lozinka) VALUES('$ime' , '$passK')";
$result = mysqli_query($dbc,$sql);
}
mysqli_close($dbc);
?>

                    <?php
                    if($ime == true) {
                        echo '<p>Korisnik je uspješno registriran!</p>';
                    } else {
                        echo '<p>Korisnik nije uspješno registriran!</p>';
                    }
                    ?>