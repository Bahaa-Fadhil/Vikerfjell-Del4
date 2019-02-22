<?php
session_start();

// Sjekker om riktig bruker har en sessjon, hvis ikke blir man sendt til innlogging
if(!isset($_SESSION['login_user'])) {
header('Location: index.php');
}

include 'inc/connect.php';
?>
<!doctype html>
<html>
<head>
<!-- 

Tittel: 
    Beskrivelse:
        Sist oppdatert:
            Utviklet av: Joacim
                Kontrollert av: 

-->    
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Vikerfjell</title>
    
<link href="styles/main.css" rel="stylesheet" type="text/css">
<!-- Google Fonts Roboto -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

<script type="text/javascript" src="functions/functions.js"></script>
    
</head>
<body>

<!-- her lager jeg en ny nav "joacim bergh" -->

<header>
  <a href="loggut.php" id="logo"><img src="bilder/logo-vikerfjell-hvitt.png" height="62px" width="83px"></a>
    <ul class="topnav" id="mytopnav">
            <li><a href="home.php">HJEM</a></li>
			<li class="main-menu-item"><a href="#">BRUKERVALG</a>
				<ul class="sub-menu">
					<li><a role="link" href="register_form.php" title="Denne linken tar deg til registrer bruker">REGISTRER BRUKER</a></li>
					<li><a role="link" href="changePasswordFormAdmin.php" title="Denne linken tar deg til bytt passord">BYTT PASSORD</a></li>
                    <li><a role="link" href="search.php" title="Denne linken tar deg til finn bruker">FINN BRUKER</a></li>
                    <li><a role="link" href="brukere.php" title="Denne linken tar deg til brukerliste">BRUKERLISTE</a></li>
				</ul>
            <li><a href="#">INNSTILLINGER</a></li>
			<li><a href="loggut.php"><img class="logo" src="../admin/bilder/account-logout-32.png"></a></li>
		</ul>
      <a href="javascript:void(0);" id="menu-icon" onclick="myHamburgerFunction()"></a>
</header>
<aside id="mytopnav">
	<div id="mySidenav" class="sidenav" >
	  <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
	  <a href="form-sider.php">Sider</a>
      <a href="sidemenu-filopplastning.php">Filopplastning</a>
	  <a href="form-meny.php">Meny</a>
      
        
	</div>
	
	<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
</aside>
    
<?php
    $sql = "select * from bruker";
    echo("<!-- Step 2 -->\n");
    $res = $con->query($sql);
    if ($res) {
    echo("<!-- Step 3 -->\n");
    } else {
    echo("<!-- Fikk ikke 3 -->\n");
    }
?>
<div>
    <h1 class="table-tekst"> Oversikt over brukere</h1>
    <table class="brukere">
      <thead>
        <tr>
          <th class="row-1 row-username">Brukernavn</th>
          <th class="row-2 row-password">Passord</th>
          <th class="row-3 row-e-mail">E-post</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $res->fetch_assoc()) { ?>
        <tr>
          <td><?php echo($row['brukerNavn']); ?></td>
          <td><?php echo($row['passord'] ="*********************************************" ); ?></td> <!-- Viser passord som (**)  isteden for å vise virklig passord "Bahaa 04.05.17"-->
          <td><?php echo($row['ePost']); ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
</div>

</body>
</html>