<?php

function regMeny()
  {
  if (isset($_POST['registrer']) && $_POST['registrer']=="Registrer meny-side") {
  //  Registrer ny film
    $tekst = $_POST['tekst'];
    $side = $_POST['side'];
    $rekke = $_POST['rekke'];
    $toolTip = $_POST['toolTip'];
	$alt = $_POST['alt'];
      
    $sql = "insert into meny (tekst,side,rekke,toolTip,alt)";
    $sql.= " values ('".$tekst."','".$side."',".$rekke.",'".$toolTip."','".$alt."')";
    echo("<!-- SQL: ".$sql." -->\n");
    $db->query($sql);
  }
	  return regMeny();
  }

  ?>