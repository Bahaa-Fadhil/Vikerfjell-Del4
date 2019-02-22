<?php 
/* 

Tittel: Søk form
    Beskrivelse: Søk form for backend med mulighet for å søke på brukernavn og e-post
        Sist oppdatert: 17.03.2017
            Utviklet av: Joacim
                Kontrollert av:*/



session_start();

// Sjekker om riktig bruker har en sessjon, hvis ikke blir man sendt til innlogging
if(!isset($_SESSION['login_user'])) {

header('Location: index.php');
}

require_once "inc/connect.php"; $con = new vikerfjellDB();
include("inc/class.MyClass.inc.php");
include("inc/class.side.inc.php");

  if (isset($_POST['registrer']) && $_POST['registrer']=="Registrer meny-side") {
  //  Registrer ny film
    mysqli_real_escape_string($con, $tekst = $_POST['tekst']);
    mysqli_real_escape_string($con, $side = $_POST['side']);
    mysqli_real_escape_string($con, $rekke = $_POST['rekke']);
    mysqli_real_escape_string($con, $toolTip = $_POST['toolTip']);
	mysqli_real_escape_string($con, $alt = $_POST['alt']);
      
    $sql = "insert into meny (tekst,side,rekke,toolTip,alt)";
    $sql.= " values ('".$tekst."','".$side."',".$rekke.",'".$toolTip."','".$alt."')";
    echo("<!-- SQL: ".$sql." -->\n");
    $con->query($sql);
  }

if (isset($_POST['Red_3']) && $_POST['Red_3']=="red") {
  //  update ny film
    $tekst = mysqli_real_escape_string($con, $_POST['tekst']);
    $side = mysqli_real_escape_string($con, $_POST['side']);
    $rekke = mysqli_real_escape_string($con, $_POST['rekke']);
    $toolTip = mysqli_real_escape_string($con, $_POST['toolTip']);
	$alt = mysqli_real_escape_string($con, $_POST['alt']);
	$id = mysqli_real_escape_string($con, $_POST['id']);
    $sql = "UPDATE meny SET";
    $sql.= "tekst='".$tekst."',side='".$side."',rekke=".$rekke.",toolTip='".$toolTip."',alt='".$alt."'";
	$sql.= "where '".$row['idmeny']."'";
	
    echo("<!-- SQL: ".$sql." -->\n");
    $db->query($sql);
  }
     
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
  <a href="loggut.php" id="logo"><img src="bilder/logo-vikerfjell.png" height="62px" width="83px"></a>
    <ul class="topnav" id="mytopnav">
            <li><a href="home.php">HJEM</a></li>
			<li class="main-menu-item"><a href="hytter.html">BRUKERVALG</a>
				<ul class="sub-menu">
					<li><a role="link" href="register_form.php" title="Denne linken tar deg til hytter til salgs">REGISTRER BRUKER</a></li>
					<li><a role="link" href="changePasswordFormAdmin.php" title="Denne linken tar deg til hytter til leie">BYTT PASSORD</a></li>
                    <li><a role="link" href="search.php" title="Denne linken tar deg til hytter til leie">FINN BRUKER</a></li>
                    <li><a role="link" href="brukere.php" title="Denne linken tar deg til hytter til leie">BRUKERLISTE</a></li>
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

<!-- innhold starter her -->
<div class="grid1 topp">
    <div class="row side">
    	<div class="col-wd-12">
        	<div class="col">
			<h1>Meny</h1>
				<h2>legg til ett meny item</h2>
				  <form action="form.php" method="POST">
					<table>
					  <tr><th>tekst</th><th>side</th>
						<th>rekke</th><th>toolTip</th><th>alt</th><th></th></tr>
					  <tr><td class="w30"><input type="text" name="tekst" autofocus class="nmr" placeholder="tekst"></td>
						<td class="w10"><input type="text" name="side" class="nmr"></td>
						<td class="w10"><input type="text" name="rekke" class="nmr"></td>
						<td class="w10"><input type="text" name="toolTip" class="nmr"></td>
						<td class="w10"><input type="text" name="alt" class="nmr"></td>
						<td class="w10"><input type="submit" name="registrer" value="Registrer meny-side"></td></tr>
					</table>
				  </form>
				<h2>eksisterende meny item</h2>
				<form method="POST" action="rediger.php" id="form1" onsubmit="return skalJegSubmitte();">
				  <input type="hidden" name="nr" id="nr">
				</form>
				<form method="POST" id="form2" onSubmit="myConfirmFunction();">
				  <input type="hidden" name="id" id="id">
				</form>
				<table>
				  <tr><th>Tekst</th><th>side</th>
					<th>rekke</th><th>toolTip</th><th>alt</th><th></th><th></th></tr>
					<?php
					  $sql = "select * from meny order by rekke;";
					  $res = $con->query($sql);
					  echo("<!-- SQL:".$sql." -->\n");
					  while ($row = $res->fetch_assoc()) {
						echo("<tr><td class='w25' id='td1_".$row['idmeny']."'>".$row['tekst']."</td>\n");
						echo("<td class='w25' id='td2_".$row['idmeny']."'>".$row['side']."</td>\n");
						echo("<td class='w10' id='td3_".$row['idmeny']."'>".$row['rekke']."</td>\n");
						echo("<td class='w10' id='td4_".$row['idmeny']."'>".$row['toolTip']."</td>\n");
						echo("<td class='w10' id='td5_".$row['idmeny']."'>".$row['alt']."</td>\n");
						$mm = "<input type='submit' name='Red_".$row['idmeny']."' value='Rediger'";
						$mm.= " onclick='visRediger(this);' form='form1'>";
						echo("<td class='w10'>".$mm."</td>\n");
						$SS = "<button type='submit' value='".$row['idmeny']."' name='slett'";
						$SS.= " form='form2'".">SLETT </button>";
						echo("<td class='w10'>".$SS."</td></tr>\n");

					  }
					?>
				</table>
			</div>
		</div>
	</div>
</div> 
    
</body>
</html>