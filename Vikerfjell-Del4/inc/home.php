<div class="parallax">
	<div class="parallax-inner">
		<div id="animated-header" class="animatedHeader fadeIn">
            <h1 class="header-tekst"><?php
							$rekke = 1;
							visTekstInnholdTittel($id, $rekke);
						?></h1><h4 class="header-tekst"><?php
							$rekke = 1;
							visTekstInnholdIngress($id, $rekke);
						?>.</h4>
        </div>
            <a onclick="FadeInAnimationFunction()"></a>
	</div>
</div>

<div class="grid">
<!--Row-->
    <div class="row2">
    	<div class="col-sm-12">
        	<div class="col4">
        		<h1 class="section-header">
        		<?php
					$rekke = 2;
					visTekstInnholdTittel($id, $rekke);
				?>
				</h1>
				<h4 class="section-tekst" id="">
				<?php
					$rekke = 2;
					visTekstInnholdIngress($id, $rekke);
				?>
				</h4>
			</div>
		</div>
	</div>
</div>
<?php
		//$teller = 0;
	$rekke=3;
	visInnholdTekst($id,$rekke);
?>
	

<!-----------------------Start parallax bilde med teaser tekst-------------------->
<div class="parallax2">
    <div class="parallax-inner">
      <h1 class="header-tekst">Storviltjakt</h1><h4 class="header-tekst">Området har lange tradisjoner for elgjakt. I de senere årene har det også etablert seg en bestand av hjort i området.</h4>
      <a href="aktuelt.html" class="button"> LES MER </a>
	</div>
</div>
<!-----------------------Slutt parallax bilde med teaser tekst-------------------->