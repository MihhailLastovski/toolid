<?php
global $yhendus;
require_once("konf.php");

$kask=$yhendus->prepare(
    "SELECT id, toon, tellimiskogus, valminudkogus FROM toolid;");
$kask->bind_result($id, $toon, $tellimiskogus, $valminudkogus);
$kask->execute();

?>
<!doctype html>
<html>
<head>
    <title>Tellimuse status</title>
    <link rel="stylesheet" href="src/css/table.css">
    <link rel="stylesheet" href="src/css/global.css">
</head>
<body>
<header><h1>Mihhail Lastovski Toolivahendus</h1></header>
<?php include ('nav.php')?>

<h1>Tellimuse status</h1>
<table>
    <tr>
        <th>Tellimuse ID</th>
        <th>Toon</th>
        <th>Tellimiskogus</th>
        <th>Valminudkogus</th>
        <th>Teha veel</th>
    </tr>
    <?php
    while($kask->fetch()){
        $check = 0;
        $check = $tellimiskogus - $valminudkogus;
        echo "
		     <tr>
			   <td>$id</td>
			   <td style='color: $toon;'>$toon</td>
			   <td>$tellimiskogus</td>
			   <td>$valminudkogus</td>
			   <td>$check</td>
			 </tr>
		   ";
    }
    ?>
</table>
</body>
</html>
