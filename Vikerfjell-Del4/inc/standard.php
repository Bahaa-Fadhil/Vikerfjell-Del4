<div class="grid topp">
<!--Row-->
    <div class="row2">
    	<div class="col-sm-12">
        	<div class="col4 hytter">
        		<h1 class="section-header">
        			<?php
						$rekke = 1;
						visTekstInnholdTittel($id, $rekke);
					?></h1>
				<h4 class="section-tekst" id="">
					<?php
						$rekke = 1;
						visTekstInnholdIngress($id, $rekke);
					?>
				</h4>
			</div>
		</div>
	</div>
</div>
        	

<!------------------start på artikkler ------------------>
<?php
	$rekke =2;
	visInnholdTekst($id,$rekke);
	
?>
<!----------------------------------Slutt på artikkler---------------------------->


<!-- footer -->