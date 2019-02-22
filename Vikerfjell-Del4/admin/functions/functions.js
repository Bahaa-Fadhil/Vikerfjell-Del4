/* 

Tittel: JavaScript Document
    Beskrivelse: 
        Sist oppdatert:
            Utviklet av: Joacim
                Kontrollert av:

*/
// JavaScript Document
var gjeldendeHensikt;
var ftekst = '';
var fside = '';
var frekke = '';
var ftoolTip = '';
var falt = '';
var forrige = '';
var knapp = '';
var knappSlett ='';
  function visRediger(denne) {
    gjeldendeHensikt = denne.value;
    if (denne.value == 'Rediger') {
      if (forrige = document.getElementById('nr').value) {
        document.getElementById('td1_'+forrige).innerHTML = ftekst;
        document.getElementById('td2_'+forrige).innerHTML = fside;
        document.getElementById('td3_'+forrige).innerHTML = frekke;
        document.getElementById('td4_'+forrige).innerHTML = ftoolTip;
		document.getElementById('td5_'+forrige).innerHTML = falt;
		 knapp.value = "Rediger";
		 knappSlett.value ="Slett";
		 alert("fNavn: "+ftekst);
      }
      //  alert("I denne formen: "+denne.form)
      nummer = denne.name.substring(4);
      ftekst = document.getElementById('td1_'+nummer).innerHTML;
      linje = "<input type='text' id='Rtekst' name='Rtekst' value='";
      linje += document.getElementById('td1_'+nummer).innerHTML;
      linje += "' class='nmr' form='form1'>";
      // alert("Vis=|"+linje+"|");
      document.getElementById('td1_'+nummer).innerHTML = linje;
      fside = document.getElementById('td2_'+nummer).innerHTML;
      linje = "<input type='text' id='Rside' name='Rside' value='";
      linje += document.getElementById('td2_'+nummer).innerHTML;
      linje += "' class='nmr' form='form1'>";
      // alert("Vis=|"+linje+"|");
      document.getElementById('td2_'+nummer).innerHTML = linje;
      frekke = document.getElementById('td3_'+nummer).innerHTML;
      linje = "<input type='text' id='Rrekke' name='Rrekke' value='";
      linje += document.getElementById('td3_'+nummer).innerHTML;
      linje += "' class='nmr' form='form1'>";
      // alert("Vis=|"+linje+"|");
      document.getElementById('td3_'+nummer).innerHTML = linje;
      ftoolTip = document.getElementById('td4_'+nummer).innerHTML;
      linje = "<input type='text' id='RtoolTip' name='RtoolTip' value='";
      linje += document.getElementById('td4_'+nummer).innerHTML;
      linje += "' class='nmr' form='form1'>";
      // alert("Vis=|"+linje+"|");
      document.getElementById('td4_'+nummer).innerHTML = linje;
	  falt = document.getElementById('td5_'+nummer).innerHTML;
      linje = "<input type='text' id='Ralt' name='Ralt' value='";
      linje += document.getElementById('td5_'+nummer).innerHTML;
      linje += "' class='nmr' form='form1'>";
      // alert("Vis=|"+linje+"|");
      document.getElementById('td5_'+nummer).innerHTML = linje;
//      document.getElementById('Red_1').value = 'Lagre';
		
		

//     document.getElementById('nr').value = nummer;
      document.getElementById('nr').value = nummer;
      denne.value = "Lagre";
      knapp = denne;
//      alert("I formen: "+denne.form.id);
//      denne.form = 'form1';
    } else if (denne.value == 'Lagre') {
//      alert("Klar til å lagre");
    } else {
      alert("I formen: "+denne.form);
    }
  }
  function skalJegSubmitte() {
//    alert("Tester. Verdi på gjeldendeHensikt: "+gjeldendeHensikt);
    if (gjeldendeHensikt=="Lagre") {return true;} else {return false;}
  }

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

	function openNav() {
		document.getElementById("mySidenav").style.width = "250px";
	}
	
	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
	}
function myConfirmFunction() {
	var r = confirm("Trykk på enten 'OK' eller 'Avbryt'!\n 'OK' for å slette element\n 'Avbryt' for å avslutte");
    if (r == true) {
       document.getElementById("id").form.action = "slett.php";
		
    }
}

/* Script for dynamisk meny */

/* Script for path visning ved filopplastning */
    function showPath(oFileInput, sTargetID) {
        var arrTemp = oFileInput.value.split('\\');
        document.getElementById(sTargetID).value = arrTemp[arrTemp.length - 1];
    }

function countdownLogin() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=0) {
    location.href = '../admin/index.php';
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
	function myLeggLayoutFunction(){
		document.getElementById('LayoutArtikkel').style.display="inherit";
	}

	function visArtikkelInnhold(){
		document.getElementById('leggtilInnholdArtikkel').style.display="inherit";
		document.getElementById('LayoutArtikkel').style.display="none";
		document.getElementById('VelgLayout').style.display="none";
		
	}
	function myLeggHeaderFunction(){
		document.getElementById('leggtilHeader').style.display="inherit";
	}
	function visBilder(){
		document.getElementById('Bilder').style.display="inherit";
	}
	function myAvbrytFunction(){
		document.getElementById('leggtil').style.display="none";
	}
     