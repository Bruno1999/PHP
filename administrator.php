
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
       
        <section class="sport"> 
            <?php
					// If user is not logging in, redirect them to prijava.html
					if( !isset($_POST['username']) && !isset($_POST['password'])){
						echo '<h2>Molimo, prijavite se <a href="login.html">Ovdje</a></h2>';
					}
					// Get connection to db
					$dbc = mysqli_connect('localhost', 'root', '', 'pwa') 
					or die('Greška pri povezivanju na bazu podataka. Error:'.mysqli_error($dbc));
					// Prepared statement
					$query = "SELECT * FROM users WHERE username=? AND password=?";
					/* Inicijalizira statement objekt nad konekcijom*/
					$stmt=mysqli_stmt_init($dbc);
					/* Povezuje parametre statement objekt s upitom*/
					if (mysqli_stmt_prepare($stmt, $query)){
						/* Povezuje parametre i njihove tipove s statement objektom*/
						$username = $_POST['username'];
						$password = $_POST['password'];
						mysqli_stmt_bind_param($stmt,'ss',$username,$password);
						/* Izvršava pripremljeni upit */
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
					}
					// Check if user has rights to administrate articles
					if (mysqli_stmt_num_rows($stmt)<=0){
						echo '<h2>Molimo, registrirajte se <a href="registracija.html">Ovdje</a></h2>';
					} else {
						// Get user's name and level
						/* Povezuje atribute iz rezultata s varijablama */
						mysqli_stmt_bind_result($stmt, $id, $username, $pw, $name, $level);
						/* Dohvaća redak iz rezultata, i posprema vrijednosti atributa u varijable navedene funkcijom mysqli_stmt_bind_result()*/
						mysqli_stmt_fetch($stmt);
						if($level <= 1){
							echo '<h2>'.$name.', Nemate  dovoljna  prava  za  pristup  ovoj stranici.</h2>';
						} else {
							// Create query
							$querySelectArticle = "SELECT * FROM vijesti;";
							// Execute query
							$insertResult = mysqli_query($dbc, $querySelectArticle) or die('Greška pri dohvaćanju članaka. Error: '.mysqli_error($dbc));
							// Display results
							while($row = mysqli_fetch_array($insertResult)){
						echo '<article><h1>'.$row['naslov'].'</h1>
							<p>'.$row['sazetak'].'</p><br/>
							<p>'.$row['sadrzaj'].'</p><br/>
							<p>'.$row['kategorija'].'</p>
							<p>'.$row['datum'].'</p>';
						
						if($row['obavijest'])
						{
							echo '<form class="adminforma" method="post" action="vidljivost.php">
								<input type="hidden" name="ID" value="'.$row['ID'].'" />
								<input type="submit" value="Sakrij" name="sakrij" id="sakrij" onclick="confirm("Zelite li arhivirati vijest?")">
								</form>';
						}
						else
						{
							echo '<form class="adminforma" method="post" action="vidljivost.php">
								<input type="hidden" name="ID" value="'.$row['ID'].'" />
								<input type="submit" value="Prikaži" name="prikazi">
								</form>';
						}
						echo '<form class="adminforma" method="post" action="izbrisi.php">
								<input type="hidden" name="ID" value="'.$row['ID'].'" />
								<input type="submit" value="Izbriši" name="izbrisi">
								</form></article>';
					}
				
					mysqli_close($dbc);
				
				?>
				
					<hr>
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