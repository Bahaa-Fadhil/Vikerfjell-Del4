// javascript document 


function myHamburgerFunction() {
    var x = document.getElementById("mytopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
function myFunction() {
    if (document.body.scrollTop > 250 || document.documentElement.scrollTop > 250) {
        document.getElementById("myScroll").className = "slideUp";
    }
}

/* Script for header animasjon function */

function FadeInAnimationFunction() {
    location.reload();
}

  function blaFram() {
    if (indeks < teller-1) {
      indeks++;
      fyllinn();
    }
  }
  function blaTilbake() {
    if (indeks > 1) {
      indeks--;
      fyllinn();
    }
}
function fyllinn() {
 document.getElementById('navn').innerHTML = Arr[indeks].navn;
 document.getElementById('sp1').innerHTML = Arr[indeks].sp1;
 document.getElementById('sp2').innerHTML = Arr[indeks].sp2;
 document.getElementById('nr').innerHTML = Arr[indeks].nr;
}

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 4000); // Change image every 2 seconds
}

function countdownForside() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=0) {
    location.href = '../sidene2/default.html';
    }
    i.innerHTML = parseInt(i.innerHTML)-1;
}

function countdownLogin() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=0) {
    location.href = '../sidene2/default.html';
    }
    i.innerHTML = parseInt(i.innerHTML)-1;
}



function myTekstFunction(id){
		 var tittel = document.getElementById('h1_'+id);
		 var ingress = document.getElementById('h2_'+id);
		 var text = document.getElementById('h3_'+id);
		 var htittel = document.getElementById('hh_1'+id);
		 var hingress = document.getElementById('hh_2'+id);
		 var htext = document.getElementById('hh_3'+id);
		 htittel.value = tittel.innerHTML;
		 hingress.value = ingress.innerHTML;
		 htext.value = text.innerHTML;
		 document.getElementById('btn_'+id).style.display = "inherit"; 
     }
	function myLeggtilFunction(){
		 var ingress = document.getElementById('h2_');
		 var text = document.getElementById('h3_');
		 var hingress = document.getElementById('hh_2');
		 var htext = document.getElementById('hh_3');
		 hingress.value = ingress.innerHTML;
		 htext.value = text.innerHTML;
		 document.getElementById('btn_artikkel').style.display = "inherit"; 
     }
	function myLeggtilHeaderFunction(){
		 var tittel = document.getElementById('h1_header');
		 var ingress = document.getElementById('h2_header');
		 var htittel = document.getElementById('hh_header1');
		 var hingress = document.getElementById('hh_header2');
		 htittel.value = tittel.innerHTML;
		 hingress.value = ingress.innerHTML;
		 document.getElementById('btn_header').style.display = "inherit"; 
     }
	function myLeggFunction(){
		document.getElementById('leggtil').style.display="inherit";
	}
	function myLeggHeaderFunction(){
		document.getElementById('leggtilHeader').style.display="inherit";
	}
	function myAvbrytFunction(){
		document.getElementById('leggtil').style.display="none";
	}