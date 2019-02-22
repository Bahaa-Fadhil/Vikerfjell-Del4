<?php 
		
	//< Her er det informasjon til sending e-post >
	
    if (isset($_POST['email']))
    
    {
    
	$email_to= "steffenjg94@gmail.com";
	$email_subject= "Mail fra Vikerfjell!";
    $email_from = "Website: Vikerfjell.com!";    
	
    // (Her er det error koder) 
        
    function died($error) {
        echo " Vi beklager, men det ble funnet feil med skjemaet du har sendt inn. ";
        echo " Disse feilene vises nedenfor.<br/><br/>"; 
        echo $error. " <br/><br/>";
        echo "Du kan gå tilbake for å rette opp feil. <br/>";
        die ();
        }
        
       // validering informasjon.
        
        if (!isset($_POST['name']))  
            if (!isset($_POST['etternavn'])) 
                if (!isset($_POST['email'])) 
                    if  (!isset($_POST['comments']))        
            {
            deid ("Vi beklager, men det ser ut å være et problem med skjemaet du har sendt inn.");
            }
        
        // Varaiblene for kontakt oss info, og kravene for info.
        
        $name= $_POST['name'];
        $Lastname= $_POST['etternavn'];
        $email= $_POST['email'];
        $telephone= $_POST['telephone'];
        $comments= $_POST['comments'];
        
        //hvis det er en annen feil med info, vis error medling. Fungerer ikke!
        //if (strlen($error_message) > 0 ) {died ($error_message);}
        
        // legger slette funksjon og retuner info hvis det er feil
        function clean_string($string)
            
        {
        $bad = array ("content-type", "bcc","to","cc", "href");
        return str_replace($bad, "", $string);
        }
	
        $email_message = "Meldingsdetaljer vises nedenfor.\n\n";
        $email_message .= "Fornavn: " .clean_string($name) . "\n";
        $email_message .= "Etternavn: " .clean_string($Lastname) . "\n";
        $email_message .= "Mobiletelefon: " .clean_string($telephone) . "\n";
        $email_message .= "Email: " .clean_string($email) . "\n";
        $email_message .= "Kommentar:  " .clean_string($comments) . "\n";
        
        // opprette e-post overskrifter
        
        $headers= 'From: ' .$email . "\r\n". 'Reply-To:'  . $email."\r\n" . $email_from. "\r\n".

            'X-Mailer: PHP/' .phpversion();
            mail($email_to, $email_subject, $email_message, $headers);
            
?>

<!doctype html>
<html>
<head>
    
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Vikerfjell</title>
    
<link href="../styles/main.css" rel="stylesheet" type="text/css">
<!-- Google Fonts Roboto, alle typer -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<!--  -->
<script type="text/javascript" src="../functions/funksjoner.js"></script>
<script>setInterval(function(){ countdownForside(); },((1000 * 600)) / 1000);</script>
    
</head>
<body>
<!-- Melding sendt -->
    <div class="grid1">
        <div class="row2">
            <div class="col-wd-12">
        	   <div class="col4 absolutecenter">
                   <a href="../sidene2/default.html">
                        <img class="logo" src="../Bilder/Logo/logo-vikerfjell.png" width="200px" height="150px">
                    </a>
                   <h1>Meldingen din er sendt</h1><br>
                    <h2>Takk for at du kontaktet oss!<br>Du vil høre fra oss innen kort tid. <br><br></h2>
                   <p>Du vil bli sendt tilbake til forsiden om <span id="counter">10</span> sekunder...</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
    }
?>