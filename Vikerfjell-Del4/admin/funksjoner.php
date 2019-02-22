<?php
require_once "inc/connect.php"; $con = new vikerfjellDB();
function visMeny(){
        require_once "inc/connect.php"; $con = new vikerfjellDB();
		//$con = mysqli_connect("158.36.139.21", "brViker", "pw_Viker", "vikerfjell");
		$sql = "select * from meny;";
		$res = $con->query($sql);
		echo("<!-- SQL:".$sql." -->\n");
		$result = $res->fetch_all(MYSQLI_ASSOC);
		foreach($result as $menyelem){
			$sidenavn = mb_strtoupper($menyelem['tekst'], 'UTF-8');
			$sidelink = $menyelem['side'];
			echo("<li class="."main-menu-item"."><a href=".$sidelink.">".$sidenavn."</a></li>\n ");
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
function passwordEncrypter($password) {
    $salt = 'IT2_2017';
    if (!empty($_POST['send'])) {
    $encrypted_password = sha1($salt.$password);
    }
    else {
    echo" 
        <script>
         window.alert('Passordkrypering feilet!')           
        </script>
        ";
    }
    return $encrypted_password;
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
function visMenyElementerListe(){
		require_once "inc/connect.php"; $con = new vikerfjellDB();
		//$con = mysqli_connect("158.36.139.21", "brViker", "pw_Viker", "vikerfjell");
		$sql = "select * from meny";
		$res = $con->query($sql);
		echo("<!-- SQL:".$sql." -->\n");
		while ($row = $res->fetch_assoc()) {
			$link = "form-sider-";
			$link.= $row['side'];
			$link.= ".php?side=".$row['side'];
			$side = $row['tekst'];
			echo("<li><a href= ".$link.">".$side."</a></li>");
		}
}
function visInnholdTekst($id){
	require_once "inc/connect.php"; $con = new vikerfjellDB();
	//$con = mysqli_connect("158.36.139.21", "brViker", "pw_Viker", "vikerfjell");
		$sql = "SELECT meny.tekst,innhold.tittel, innhold.ingress, innhold.rekke, innhold.side, innhold.text
FROM meny, innhold
where meny.idmeny = innhold.idmeny and meny.idmeny = $id
order by innhold.rekke;";
		//$teller = 0;
		$res = $con->query($sql);
		//echo("<!-- SQL:".$sql." -->\n");
		$result = $res->fetch_all(MYSQLI_ASSOC);
		foreach($result as $menyelem){
			$tekst = $menyelem['text'];
			$rekke = $menyelem['rekke'];
			echo("<div class='col-wd-12 col-md-6 col-sm-4'>\n");
			echo("	<div class='col4'>\n");
            echo("		<a href='kontaktoss.html'>\n");
            echo("		<div class='container'>\n");
            echo(" 		<img class='images' src='Bilder/aktuelt/nyheter/isfiske.jpg' width='100%' height='100%' alt='Bilde av hyttertomter'>\n");
			echo("		<div class='overlay'></div>\n");
			echo("		</div>\n");
            echo(" 		<div class='artikkel-tekst'>\n");
			echo("		<h2>".$tekst."</h2>\n");
			echo("		</div>\n");
			echo("		</a>\n");
			echo("	</div>\n");
		echo("</div>");
			//}else {
				//echo("<div class='grid'>\n");
    //echo("<div class='row2'>");
			//}
			//$teller + 1;
		}	
	
}
function visTekstInnhold($id,$rekke){
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
			echo(".$tittel.");
			echo(".$ingress.");
			echo(".$tekst.");
		}	
	
}
function resize($width, $height){
  // Henter bilde
  list($w, $h) = getimagesize($_FILES['fil1']['tmp_name']);
  // Kalkulerer ny bildestørrelse
  $ratio = max($width/$w, $height/$h);
  $h = ceil($height / $ratio);
  $x = ($w - $width / $ratio) / 2;
  $w = ceil($width / $ratio);
  // Setter nytt filnavn
  $path = '../upload/'.$width.'x'.$height.'_'.$_FILES['fil1']['name'];
  // Henter data fra bildefilen
  $imgString = file_get_contents($_FILES['fil1']['tmp_name']);
  // Lager nytt bilde fra dataen
  $image = imagecreatefromstring($imgString);
  $tmp = imagecreatetruecolor($width, $height);
  $tmp = imagecreatetruecolor($width, $height);
  imagecopyresampled($tmp, $image,
    0, 0,
    $x, 0,
    $width, $height,
    $w, $h);
  // Lagrer nytt bilde
  switch ($_FILES['fil1']['type']) {
    case 'image/jpeg':
      imagejpeg($tmp, $path, 100);
      break;
    case 'image/png':
      imagepng($tmp, $path, 0);
      break;
    case 'image/gif':
      imagegif($tmp, $path);
      break;
    default:
      exit;
      break;
  }
  return $path;
    
  imagedestroy($image);
  imagedestroy($tmp);
}

?>