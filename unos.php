
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
                            <li><a href="unos.php">Unos</a></li>
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


                        <article >   
                                                    
                                                    
                        <form action=""  method="POST">

                                                        
                                <label for="naslov">Naslov vijesti:</label>
                                    <input type="text" name="naslov"  size="64" maxlength="70" placeholder="Naslov vijesti" required autofocus><br>
                                
                                
                                <label for="sazetak">Kratki sažetak:</label>
                                    <textarea  name="sazetak" rows="2" cols="50" placeholder="Kratki sadržaj" required></textarea><br>
                            

                                <label for="sadrzaj">Sadržaj vijesti:</label>
                                    <textarea  name="sadrzaj" rows="2" cols="50" placeholder="Sadržaj vijesti" required></textarea><br>
                                
                                <label for="slika">Slika: </label>
                                    <input type="file" name="slika" accept="image/*">
                                
                                
                            
                                
                                <label for="kategorija">Kategorija:</label>
                                    <select style="border-radius:0; box-shadow:0;" name="kategorija">
                                        <option value=""disabled selected>--------</option>
                                        <option value="Sport">Sport</option>
                                        <option value="Tehnologija">Tehnologija</option>
                                        <option value="Znanost" >Znanost</option>
                                        <option value="Automobili">Automobili</option>
                                       
                                    </select>
                                
                                
                                <br>
                                <label>Prikaži na stranici</label>
                                <input type="checkbox" name="prikazi"  value="Yes" checked ><br>
                               
                                <button type="submit" value="Prihvati" name="slanje" >Prihvati</button>
                                <button type="reset" value="Poništi">Poništi</button>
                               
                                
                            </form>

                        </article>
                
                        
                    </section>

                    <?php
                                //include 'connect.php';
                                 
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $basename ="pwa";

                                //Create connection
                                $dbc = mysqli_connect($servername, $username, $password, $basename) 
					            or die('Error connecting to MySQL server.');
                                mysqli_set_charset($dbc, "utf8");

                                // Check connection

                                if($dbc){
                                    echo "Connected successfully<br>";
                                }else{
                                    echo "Connection failed<br>". mysqli_connect_error();
                                }
                                $naslov = $_POST['naslov'];
                                $sazetak = $_POST['sazetak'];
                                $sadrzaj = $_POST['sadrzaj'];
                                $slika = $_POST['slika'];
                                $kategorija = $_POST['kategorija'];
                                $prikazi = $_POST['prikazi'];
                                $datum = date("H:i:s j.n.Y");

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
                                
                               
                               
                               
                                if(isset($_POST['slanje'])){
                                    
                                    $query =  "INSERT INTO vijesti ( naslov, kratkiSadrzaj, sadrzaj, slika, kategorija, vidljiv, datum)
                                    VALUES ( '$naslov','$sazetak','$sadrzaj','$slika','$kategorija','$prikazi','$datum')";
                                
                                    $result = mysqli_query($dbc,$query) or trigger_error(mysqli_error().$query);
                                    //mysqli_close($dbc);

                                    $target = 'slike/' . $slika;
                                    move_uploaded_file($_FILES['slika']['tmp_name'], '$target');
                                    mysqli_close($dbc);
                                
                                }
                               
                               

                               
					           
						
                            ?>   

                

    <script type="text/javascript">
		// Provjera forme prije slanja
		document.getElementById("slanje").onclick = function(event) {
			
			var slanjeForme = true;
			
			// Naslov vijesti(5-30 znakova)
			var poljeNaslov = document.getElementById("naslov");
			var naslov = document.getElementById("naslov").value;
			if (naslov.length < 5 || naslov.length > 30) {
				slanjeForme = false;
				poljeNaslov.style.border="1px dashed red";
				document.getElementById("poruka1").innerHTML="Naslov vijesti mora imati 5 do 30 znakova!";
			} else {
				poljeNaslov.style.border="1px solid green";
				document.getElementById("poruka1").innerHTML="";
			}
			
			// Kratki sadržaj (10-100 znakova)
			var poljeSazetak = document.getElementById("sazetak");
			var sazetak = document.getElementById("sazetak").value;
			if (sazetak.length < 10 || sazetak.length > 100) {
				slanjeForme = false;
				poljeSazetak.style.border="1px dashed red";
				document.getElementById("poruka2").innerHTML="Opis proizvoda mora imati između 10 i 100 znakova!";
			} else {
				poljeSazetak.style.border="1px solid green";
				document.getElementById("poruka2").innerHTML="";
			}	
			
			// Sadržaj vijesti (10-1000 znakova)
			var poljeSadrzaj = document.getElementById("sadrzaj");
			var sadrzaj = document.getElementById("sadrzaj").value;
			if (sadrzaj.length < 10 || sadrzaj.length > 1000) {
				slanjeForme = false;
				poljeSadrzaj.style.border="1px dashed red";
				document.getElementById("poruka3").innerHTML="Opis proizvoda mora imati između 10 i 100 znakova!";
			} else {
				poljeSadrzaj.style.border="1px solid green";
				document.getElementById("poruka3").innerHTML="";
			}
	
			// Kategorija mora biti odabrana
			var poljeKategorija = document.getElementById("kategorija");
			if(document.getElementById("kategorija").selectedIndex == 0) {
				slanjeForme = false;
				poljeKategorija.style.border="1px dashed red";
				document.getElementById("poruka4").innerHTML="Kategorija mora biti odabrana!<br>";
			} else {
				poljeKategorija.style.border="1px solid green";
				document.getElementById("poruka4").innerHTML="";
			}
			
			if (slanjeForme != true) {
				event.preventDefault();
			}
			
		};
		
		// obavijest
		document.getElementById("prikazi").onclick = function() {
			
			if (document.getElementById("prikazi").checked == true) {
			
				var potvrda = confirm("Jeste li sigurni da želite arhivirati vijest?");
				if (potvrda == false) {
					document.getElementById("prikazi").checked = false;
				} else {
					document.getElementById("prikazi").checked = true;
				}
			
			}
			
		};
		
	</script>
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
