<?php
global $yhendus;
require_once("konf.php");
if(isSet($_REQUEST["sisestusnupp"])){
        $kask=$yhendus->prepare(
            "INSERT INTO toolid(toon, tellimiskogus) VALUES (?, ?)");
        $kask->bind_param("si", $_REQUEST["toon"], $_REQUEST["tellimiskogus"]);
        $kask->execute();
        $yhendus->close();
        header("Location: tellimus.php");
        exit();
}
?>
<!doctype html>
<html>
  <head>
     <title>Tehke tellimus</title>
      <link rel="stylesheet" href="src/css/reg.css">
      <link rel="stylesheet" href="src/css/global.css">
  </head>
  <body>
  <header><h1>Mihhail Lastovski Toolivahendus</h1></header>
  <?php include ('nav.php')?>

    <h1>Tehke tellimus</h1>
	<form class="regform" action="?">
	  <dl>
	    <dt>Toon:</dt>
		<dd><input type="color" name="toon" /></dd>
	    <dt>Tellimuse kogus:</dt>
		<dd><input type="number" name="tellimiskogus" min="1"/></dd>
	    <dt><input type="submit" name="sisestusnupp" value="Tellima" /></dt>
	  </dl>
	</form>
  </body>
</html>