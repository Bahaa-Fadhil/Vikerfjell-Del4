	<!-- e-post skjema-->
	<div class="background-img topp">
		<div class="grid2" id="kontakt-grid">
			<div class="row" id="kontakt-row">
				<div class="col-wd-12 col-md-6">
					<div class="col3" id="kontakt">
						<h3 class="kontakt-h3">Kontakt oss</h3>
						<form id="formkontakt" name="Sendmail" method="post" action="php/sendmail.php">
							<input class="textfield" type="text" name="name" required oninvalid="this.setCustomValidity('Må være et gyldig fornavn')" oninput="setCustomValidity('')" pattern="[a-zA-Z\s]{2,50}" autofocus placeholder="Fornavn">
							<input class="textfield" type="text" name="etternavn" required oninvalid="this.setCustomValidity('Må være et gyldig etternavn')" oninput="setCustomValidity('')" pattern="[a-zA-Z\s]{2,50}" placeholder="Etternavn">
							<input class="textfield" type="text" name="telephone" required oninvalid="this.setCustomValidity('Må være et gyldig telefonnummer'(8 siffer)')" oninput="setCustomValidity('')" pattern="[0-9]{8,8}" placeholder="Telefon">
							<input class="textfield" type="text" name="email" required placeholder="E-post">
							<textarea class="kontakt" name="comments" required oninvalid="this.setCustomValidity('Du må skrive noe i tekstfeltet)" placeholder="Hva lurer du på?"></textarea>
							<input class="btn kontakt" type="submit" name="send" value="Send epost" />
						</form>
					</div>
				</div>
				<div class="col-wd-12 col-md-6 col-sm-6">
					<div class="col3" id="kontakt-info">
						<div class="kontakt-tekst">
							<h3 class="kontakt-h3">Elsrud Gård</h3><br>
							<p><a class="kontaktinfo" href="mailto:joacimbergh@gmail.com?Subject=Vikerfjell.com%20Kontakt" target="_top">E-post: info@elsrud.no</a></p>
							<p><a class="kontaktinfo" href="tel:+4793011567">Telefon: +47 930 11 567  / +47 930 66 200</a></p>
							<p class="kontaktinfo">3516 Hønefoss NORWAY</p>
							<p class="kontaktinfo">Vestre Ådal 922</p>
						</div>
						<div class="share-icons kontakt">
							<a class="socialIcons" href="https://www.facebook.com" target="_blank" title="Følg oss på Facebook" alt="Facebook gruppe"> <img src="Bilder/Icon/icon-facebook-white.svg" width="45px" height="45px"></a>

							<a class="socialIcons" href="https://www.instagram.com/" target="_blank" title="Følge oss på Instagram" alt="Instagram side"><img src="Bilder/Icon/icon-instagram-white.svg" alt="link til twitter" width="45px" height="45px"></a>
						</div>
					</div>
					<!-- </div> -->
				</div>
			</div>
		</div>
	</div>




	<!-- google maps -->
	<!-- <div class="grid2">
			<div class="row">
				<div class="col-wd-12">
					<div class="col3"> -->
	<div class="map-wrap">
		<div class="overlay-map" onClick="style.pointerEvents='none'"></div>
		<!-- wrap map iframe to turn off mouse scroll and turn it back on on click -->

		<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d74885.88402589515!2d10.018527032309215!3d60.447654917924055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46404ebc2dd64ba9%3A0xe71f9ea60cb6d410!2sElsrud+G%C3%A5rd!5e0!3m2!1sno!2sno!4v1488830623890"
			width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

	</div>