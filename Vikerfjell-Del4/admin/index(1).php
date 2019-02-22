<!DOCTYPE HTML>
<html>
<head>
  <script>
     function myFunction(){
         var xr = new XMLHttpRequest();
         var url = "saveNewText.php";
         var text = document.getElementById("myDiv").innerHTML;
         var vars = "newText="+text;
         
         xr.open("POST", url, true);
         xr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xr.send(vars);
     }
     
  </script>
</head>
<body>

<h1>HELLO WORLD!</h1>

<div id="myDiv" contenteditable="true" onblur="myFunction()">

<?php include("myText.txt"); ?>

</div>



</body>



</html>