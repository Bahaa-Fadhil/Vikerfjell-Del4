<?php
require_once "inc/connect.php"; 
$con = new vikerfjellDB();

function visMeny(){
		require_once "inc/connect.php"; $con = new vikerfjellDB();
		//$con = mysqli_connect("158.36.139.21", "brViker", "pw_Viker", "vikerfjell");
		$sql = "select * from meny order by rekke;";
		$res = $con->query($sql);
		echo("<!-- SQL:".$sql." -->\n");
		$result = $res->fetch_all(MYSQLI_ASSOC);
		foreach($result as $menyelem){
			$sidenavn = mb_strtoupper($menyelem['tekst'], 'UTF-8');
			$sidelink = $menyelem['side'];
			echo("<li><a href='".$sidelink."'>".$sidenavn."</a></li>\n ");
		}	
	}

function visMenyFooter(){
		require_once "inc/connect.php"; $con = new vikerfjellDB();
		//$con = mysqli_connect("158.36.139.21", "brViker", "pw_Viker", "vikerfjell");
		$sql = "select * from meny order by rekke;";
		$res = $con->query($sql);
		echo("<!-- SQL:".$sql." -->\n");
		$result = $res->fetch_all(MYSQLI_ASSOC);
		foreach($result as $menyelem){
			$sidenavn = mb_strtoupper($menyelem['tekst'], 'UTF-8');
			$sidelink = $menyelem['side'];
			echo("<li><a href='".$sidelink."'>".$sidenavn."</a></li><br>\n ");
		}	
	}



function visSubMeny(){
		require_once "inc/connect.php"; $con = new vikerfjellDB();
		//$con = mysqli_connect("158.36.139.21", "brViker", "pw_Viker", "vikerfjell");
		$sql = "SELECT * FROM submeny;";
		$res = $con->query($sql);
		echo("<!-- SQL:".$sql." -->\n");
		$result = $res->fetch_all(MYSQLI_ASSOC);
		foreach($result as $menyelem){
			$subtekst = mb_strtoupper($menyelem['sub_tekst'], 'UTF-8');
			$sublink = $menyelem['sub_side'];
			echo("<ul class="."sub-menu".">");
			echo("<li><a href=".$sublink.">".$subtekst."</a></li>\n");
		}	
	}
function visMenyElementer(){
		require_once "inc/connect.php"; $con = new vikerfjellDB();
		//$con = mysqli_connect("158.36.139.21", "brViker", "pw_Viker", "vikerfjell");
		$sql = "select * from meny";
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
}
function visInnholdTekst($id,$rekke){
	require_once "inc/connect.php"; $con = new vikerfjellDB();
	//$con = mysqli_connect("158.36.139.21", "brViker", "pw_Viker", "vikerfjell");
		$sql = "select innhold.side, innhold.ingress, innhold.idmeny, innhold.tittel, innhold.text, innhold.rekke, bilderinnhold._idbilder, bilder.hvor 
from innhold, bilderinnhold, bilder 
where innhold.idinnhold = bilderinnhold._idinnhold and bilder.idbilder = bilderinnhold._idbilder and
idmeny= $id and innhold.rekke >=$rekke
group by innhold.side, innhold.ingress, innhold.idmeny, innhold.tittel, innhold.text, innhold.rekke, bilderinnhold._idbilder, bilder.hvor 
order by rekke;";
		//$teller = 0;
		$res = $con->query($sql);
		$teller =1;
		echo("<div class='grid'>");
			echo("<div class='row2'>");
		try {$width = $res->num_rows<3 ? 12/$res->num_rows : 4;
		} catch (Exception $e) {
    	echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		while ($row = $res->fetch_assoc()) {
			
			$ingress = $row['ingress'];
			$tekst = $row['text'];
			$rekke = $row['rekke'];
			$bilde = $row['hvor'];
			$link = $row['side'];
			if($teller%3==1 && $teller !=1){
			echo('</div></div>');
			echo("<div class='grid'>");
			echo("<div class='row2'>");
			}
			echo("<div class='col-wd-12 col-md-6 col-sm-".$width."'>\n");
			echo("	<div class='col4'>\n");
            echo("		<a href='sidene/".$link."'>\n");
            echo("		<div class='container'>\n");
            echo(" 		<img class='images' src='../".$bilde."' width='100%' height='100%' alt='Bilde av hyttertomter'>\n");
			echo("		<div class='overlay'></div>\n");
			echo("		</div>\n");
            echo(" 		<div class='artikkel-tekst'>\n");
			echo("		<h2>".$ingress."</h2>\n");
			if($width<11){
				echo("		</div>\n");
			echo("		</a>\n");
			echo("	</div>\n");
			echo("</div>");
			$teller++;
			}else {
			echo("		<p>".$tekst."</p>\n");
			echo("		</div>\n");
			echo("		</a>\n");
			echo("	</div>\n");
			echo("</div>");
			$teller++;
				}
		}
	echo('</div></div>');

}

function visInnholdTekstVanlig($id,$rekke){
	require_once "inc/connect.php"; $con = new vikerfjellDB();
	//$con = mysqli_connect("158.36.139.21", "brViker", "pw_Viker", "vikerfjell");
		$sql = "SELECT meny.tekst,innhold.tittel, innhold.ingress, innhold.rekke, innhold.side, innhold.text, innhold.idinnhold
FROM meny, innhold
where meny.idmeny = innhold.idmeny and meny.idmeny = $id and innhold.rekke >=$rekke
order by innhold.rekke;";
		//$teller = 0;
		$res = $con->query($sql);
		$teller =1;
		echo("<div class='grid'>");
			echo("<div class='row2'>");
		try {$width = $res->num_rows<3 ? 12/$res->num_rows : 4;
		} catch (Exception $e) {
    	echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		while ($row = $res->fetch_assoc()) {
			$ingress = $row['ingress'];
			$tekst = $row['text'];
			$rekke = $row['rekke'];
			$link = $row['side'];
			$idinnhold = $row['idinnhold'];
			if($teller%3==1 && $teller !=1){
			echo('</div></div>');
			echo("<div class='grid'>");
			echo("<div class='row2'>");
			}
			echo("<div class='col-wd-12 col-md-6 col-sm-".$width."'>\n");
			echo("	<div class='col4' id='".$idinnhold."'>\n");
            echo("		<a href='".$link."'>\n");
            echo("		<div class='container'>\n");
			// her har vi hard kodet ett bilde. dette er for at vi ikke har fått helt til å hente ut bilder av databasen ennå- joacim
            echo(" 		<img class='images' src='../Bilder/aktuelt/nyheter/isfiske.jpg' width='100%' height='100%' alt='Bilde av hyttertomter'>\n");
			echo("		</div>\n");
            echo(" 		<div class='artikkel-tekst'>\n");
			echo("		<h2>".$ingress."</h2>\n");
			if ($width==6){
				echo("		</div>\n");
			echo("		</a>\n");
			echo("	</div>\n");
			echo("</div>");
			$teller++;
			}else {
			echo("		<p>".$tekst."</p>\n");
			echo("		</div>\n");
			echo("		</a>\n");
			echo("	</div>\n");
			echo("</div>");
			$teller++;
				}
		}
	echo('</div></div>');

}
function visArtikkel($id,$rekke){
	require_once "inc/connect.php"; $con = new vikerfjellDB();
	//$con = mysqli_connect("158.36.139.21", "brViker", "pw_Viker", "vikerfjell");
		$sql = "SELECT innhold.tittel, innhold.ingress, innhold.text,innhold.side from innhold,meny
where innhold.idmeny = meny.idmeny
AND idinnhold = '135';";
		//$teller = 0;
		$res = $con->query($sql);
		$teller =1;
		echo("<div class='grid'>");
			echo("<div class='row2'>");
		try {$width = $res->num_rows<3 ? 12/$res->num_rows : 4;
		} catch (Exception $e) {
    	echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		while ($row = $res->fetch_assoc()) {
			$ingress = $row['ingress'];
			$tekst = $row['text'];
			$rekke = $row['rekke'];
			$link = $row['side'];
			if($teller%3==1 && $teller !=1){
			echo('</div></div>');
			echo("<div class='grid'>");
			echo("<div class='row2'>");
			}
			echo("<div class='col-wd-12 col-md-6 col-sm-".$width."'>\n");
			echo("	<div class='col4'>\n");
            //echo("		<a href='".$link."'>\n");
            echo("		<div class='container'>\n");
			// her har vi hard kodet ett bilde. dette er for at vi ikke har fått helt til å hente ut bilder av databasen ennå- joacim
            echo(" 		<img class='images' src='../Bilder/aktuelt/nyheter/isfiske.jpg' width='100%' height='100%' alt='Bilde av hyttertomter'>\n");
			echo("		</div>\n");
            echo(" 		<div class='artikkel-tekst'>\n");
			echo("		<h2>".$ingress."</h2>\n");
			if ($width==6){
				echo("		</div>\n");
			echo("		</a>\n");
			echo("	</div>\n");
			echo("</div>");
			$teller++;
			}else {
			echo("		<p>".$tekst."</p>\n");
			echo("		</div>\n");
			//echo("		</a>\n");
			echo("	</div>\n");
			echo("</div>");
			$teller++;
				}
		}
	echo('</div></div>');

}
function hentIdMeny($id){
	$sql = "SELECT idmeny, side FROM meny where side='sidene2/default.html';";
		//$teller = 0;
		$res = $con->query($sql);
		//echo("<!-- SQL:".$sql." -->\n");
		$result = $res->fetch_all(MYSQLI_ASSOC);
		foreach($result as $menyelem){
		$id.= $menyelem['idmeny'];}
		echo("$id");
}

function visTekstInnholdTittel($id,$rekke){
	require_once "inc/connect.php"; $con = new vikerfjellDB();
	//$con = mysqli_connect("158.36.139.21", "brViker", "pw_Viker", "vikerfjell");
		$sql = "SELECT meny.tekst,innhold.tittel, innhold.ingress, innhold.rekke, innhold.side, innhold.text
FROM meny, innhold
where meny.idmeny = innhold.idmeny and meny.idmeny = $id and innhold.rekke = $rekke
order by innhold.rekke;";
		//$teller = 0;
		$res = $con->query($sql);
		//echo("<!-- SQL:".$sql." -->\n");
		$result = $res->fetch_all(MYSQLI_ASSOC);
		foreach($result as $menyelem){
			$tekst = $menyelem['text'];
			$ingress = $menyelem['ingress'];
			$tittel = mb_strtoupper($menyelem['tittel'], 'UTF-8');
			echo("$tittel");
			//echo("$ingress");
			//echo("$tekst");
		}	
	
}
function visTekstInnholdIngress($id,$rekke){
	require_once "inc/connect.php"; $con = new vikerfjellDB();
	//$con = mysqli_connect("158.36.139.21", "brViker", "pw_Viker", "vikerfjell");
		$sql = "SELECT meny.tekst,innhold.tittel, innhold.ingress, innhold.rekke, innhold.side, innhold.text
FROM meny, innhold
where meny.idmeny = innhold.idmeny and meny.idmeny = $id and innhold.rekke = $rekke
order by innhold.rekke;";
		//$teller = 0;
		$res = $con->query($sql);
		//echo("<!-- SQL:".$sql." -->\n");
		$result = $res->fetch_all(MYSQLI_ASSOC);
		foreach($result as $menyelem){
			$tekst = $menyelem['text'];
			$ingress = $menyelem['ingress'];
			$tittel = $menyelem['tittel'];
			//echo("$tittel");
			echo("$ingress");
			//echo("$tekst");
		}	
	
}
function visTekstInnholdTekst($id,$rekke){
	require_once "inc/connect.php"; $con = new vikerfjellDB();
	//$con = mysqli_connect("158.36.139.21", "brViker", "pw_Viker", "vikerfjell");
		$sql = "SELECT meny.tekst,innhold.tittel, innhold.ingress, innhold.rekke, innhold.side, innhold.text
FROM meny, innhold
where meny.idmeny = innhold.idmeny and meny.idmeny = $id and innhold.rekke = $rekke
order by innhold.rekke;";
		//$teller = 0;
		$res = $con->query($sql);
		//echo("<!-- SQL:".$sql." -->\n");
		$result = $res->fetch_all(MYSQLI_ASSOC);
		foreach($result as $menyelem){
			$tekst = $menyelem['text'];
			$ingress = $menyelem['ingress'];
			$tittel = $menyelem['tittel'];
			//echo("$tittel");
			//echo("$ingress");
			echo("$tekst");
		}	
	
}
?>