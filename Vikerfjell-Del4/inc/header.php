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
<!--  -->    
</head>
<body>
<!-- her lager jeg en ny nav "joacim bergh" -->
<header>
  <a href="default.html" id="logo"><img id="logo-img" src="../Bilder/Logo/logo-vikerfjell.png" height="62px" width="83px"></a>
    <ul class="topnav" id="mytopnav">
		<?php
			echo visMeny();
		?>
		<div id="wrap">
	        <form action="" autocomplete="on">
               <input class="søk" id="search" name="search" type="text"  placeholder="Søk...."><input id="search_submit" value="Rechercher" type="submit">
            </form>
        </div>
    </ul>
      <a href="javascript:void(0);" id="menu-icon" onclick="myHamburgerFunction()"></a>
</header>
<!-- slutt på header -->
<!-- header tekst --->