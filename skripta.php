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


                        <article>   
                           
                            <?php
                                include 'connect.php';
                                
                               
                                
                                if (isset($_POST['prikazi'])){

                                    $naslov = $_POST['naslov'];
                                    $sazetak = $_POST['sazetak'];
                                    $sadrzaj = $_POST['sadrzaj'];
                                    $slika = $_POST['slika'];
                                    $kategorija = $_POST['kategorija'];
                                    $prikazi = $_POST['prikazi'];
                                    $datum = date("H:i:s j.n.Y");

                                    echo "Vijest nije skrivena". "</br>";

                                    echo 'Ketegorija: ' . $kategorija . '</br>';
                                    echo 'Naslov: ' . $naslov. '</br>';
                                    echo "<p>AUTOR:</p> ";
                                    echo "<p>OBJAVLJENO:</p>";
                                    echo "<img src='img/$slika'";
                                    echo 'Sazetak: ' . $sazetak. '</br>';
                                    echo 'Sadrzaj: ' . $sadrzaj. '</br>';
                                    echo 'Datum: '. $datum. '</br>';
                                    
                                }
                                else
                                {
                                    echo "Vijest je označena kao skrivena";
                                }
                                
                               

                              
                               
                            ?>                         
                            
                        </article>
                
                        
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