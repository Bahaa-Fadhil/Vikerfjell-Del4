
<!------------------------------      neste section med artikkler. Hytter til leie ---->

<div class="grid">
<!--Row-->
    <div class="row2">
    	<div class="col-sm-12">
        	<div class="col4 hytter">
        		<h1 class="section-header">
        			<?php
					$sql = "SELECT idmeny, side FROM meny where side='aktuelt.php';";
		//$teller = 0;
		$res = $con->query($sql);
		//echo("<!-- SQL:".$sql." -->\n");
		$result = $res->fetch_all(MYSQLI_ASSOC);
		foreach($result as $menyelem){
		$id = $menyelem['idmeny'];
						$rekke = 8;
						visTekstInnholdTittel($id, $rekke);}
					?></h1>
				<h4 class="section-tekst" id="">
					<?php
					$sql = "SELECT idmeny, side FROM meny where side='aktuelt.php';";
		//$teller = 0;
		$res = $con->query($sql);
		//echo("<!-- SQL:".$sql." -->\n");
		$result = $res->fetch_all(MYSQLI_ASSOC);
		foreach($result as $menyelem){
		$id = $menyelem['idmeny'];
						$rekke = 8;
						
						visTekstInnholdIngress($id, $rekke);}
					?>
				</h4>
			</div>
		</div>
	</div>
</div>
<!-------------------- 2 artikkeler section ---------->
<?php
		$sql = "SELECT idmeny, side FROM meny where side='aktuelt.php';";
		//$teller = 0;
		$res = $con->query($sql);
		//echo("<!-- SQL:".$sql." -->\n");
		$result = $res->fetch_all(MYSQLI_ASSOC);
		foreach($result as $menyelem){
		$id = $menyelem['idmeny'];
	$rekke =9;
	visInnholdTekst($id,$rekke);}
?>
