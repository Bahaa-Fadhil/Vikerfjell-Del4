<?php

$meny = array();

class Side{
	public $id ="";
	public $tekst="";
	public $side="";
	public $rekke="";
	public $tooltip="";
	public $alt="";
		
	public $seksjoner = array();
		
	/*public function __construct($id,$tekst,$side,$rekke,$tooltip,$alt){
		$this->id = $id;
		$this->tekst = $tekst;
		$this->side = $side;
		$this->rekke = $rekke;
		$this->tooltip = $tooltip;
		$this->alt = $alt;
	}*/
	public function getProperty()
  {
      return $this->id . "<br />/n";
  }
	public function visMeny(){
		$con = mysqli_connect("158.36.139.21", "brViker", "pw_Viker", "vikerfjell");
		$sql = "select * from meny";
		$res = $con->query($sql);
		echo("<!-- SQL:".$sql." -->\n");
		$result = $res->fetch_all(MYSQLI_ASSOC);
		foreach($result as $menyelem){
			$sidenavn = mb_strtoupper($menyelem['tekst'], 'UTF-8');
			$sidelink = $menyelem['side'];
			echo("<li><a href=".$sidelink.">".$sidenavn."</a></li> ");
		}	
	}
}
/*
$sql = 'select * from meny';
$res = $con->query($sql);
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
}*/

/*$obj = new Side;
 
// Output the object as a string
echo $obj->newMethod();
 
// Use a method from the parent class
echo $obj->getProperty();*/
?>

