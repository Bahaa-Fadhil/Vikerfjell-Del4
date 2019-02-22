<?php
/* 

Tittel: 
    Beskrivelse: 
        Sist oppdatert:
            Utviklet av: Joacim
                Kontrollert av: 

*/
session_start();

// Sjekker om riktig bruker har en sessjon, hvis ikke blir man sendt til innlogging
if(!isset($_SESSION['login_user'])) {

header('Location: index.php');
}

require_once "inc/connect.php"; $con = new vikerfjellDB();

$db = new Kobling();

$meny = array();

class Side{
	public $id,
	$tekst,
	$side,
	$rekke,
	$tooltip,
	$alt;
		
	public $seksjoner = array();
		
	public function __construct($id,$tekst,$side,$rekke,$tooltip,$alt){
		$this->id = $id;
		$this->tekst = $tekst;
		$this->side = $rekke;
		$this->tooltip = $tooltip;
		$this->alt = $alt;
	}
	public function getProperty()
  {
      return $this->id . "<br />/n";
  }
}
$sql = 'select * from meny';
$res = $db->query($sql);
$menyres = $res->fetch_all(MYSQLI_ASSOC);

foreach($menyres as $element){
	$id = $element['idmeny'];
	$tekst = $element['tekst'];
	$side = $element['side'];
	$tooltip = $element['tooltip'];
	$alt = $element['alt'];
	//flere variabler
	
	$tmpside = new Side($id,$tekst,$side,$rekke,$tooltip,$alt);
	$meny[$tmpside->id] = $tmpside;
}

foreach($meny as $side){
	echo($side->tekst);
	//echo($side->id);
}

$obj = new Side;
 
// Output the object as a string
echo $obj->newMethod();
 
// Use a method from the parent class
echo $obj->getProperty();

?>