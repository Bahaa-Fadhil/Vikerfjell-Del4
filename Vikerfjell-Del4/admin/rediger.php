<?php
  require_once "inc/connect.php"; $con = new vikerfjellDB();
  echo("Nr = ".$_POST['nr']."<br />");
 var_dump($_POST);
  if (isset($_POST['nr'])) {$submitKnapp = "Red_".$_POST['nr'];}
  if (isset($_POST[$submitKnapp]) && $_POST[$submitKnapp]=="Lagre") {
    $tekst = $_POST['Rtekst'];
    $side = $_POST['Rside'];
    $rekke = $_POST['Rrekke'];
    $toolTip = $_POST['RtoolTip'];
	$alt = $_POST['Ralt'];
	//$id = $_POST['id'];
    $sql = "UPDATE meny SET ";
    $sql.= "tekst='".$tekst."',side='".$side."',rekke=".$rekke.",toolTip='".$toolTip."',alt='".$alt."'";
	$sql.= " where idmeny=".$_POST['nr'];
    $con->query($sql);
	  echo("<!-- SQL: ".$sql." -->\n");
    header("Location: form.php");
  }


?>