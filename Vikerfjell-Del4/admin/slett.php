 <?php
  require_once "inc/connect.php"; $con = new vikerfjellDB();

  echo("Nr = ".$_POST['slett']."<br />");
	//var_dump($_POST);
	if (isset($_POST['slett'])){
		$sql = "SELECT * FROM meny WHERE idmeny=".$_POST['slett'];
		$res = $con->query($sql);
		echo("<!-- SQL: ".$sql." -->\n");
		while ($row = $res->fetch_assoc()) {
			echo $row['side'];
			unlink('form-sider-'.$row['side'].'.php');
			unlink('../sidene/'.$row['side']);
			//header("Location: form-meny.php");
		}
	}
    if (isset($_POST['slett'])){
	//$id = $_POST['id'];
    $sql = "DELETE FROM meny WHERE idmeny =".$_POST['slett'];
    $con->query($sql);
	  	echo("<!-- SQL: ".$sql." -->\n");
		header("Location: form-meny.php");
	}
	
		
?>
