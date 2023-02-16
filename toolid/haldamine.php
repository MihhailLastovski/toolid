<?php
global $yhendus;
require_once("konf.php");
if (isset($_REQUEST['punkt']))
{
    $kask = $yhendus -> prepare('UPDATE toolid SET valminudkogus = valminudkogus+1 WHERE id=?');
    $kask->bind_param("i", $_REQUEST['punkt']);
    $kask ->execute();
    header("Location: haldamine.php");
}
$kask=$yhendus->prepare(
    "SELECT id, toon, tellimiskogus, valminudkogus FROM toolid WHERE tellimiskogus != valminudkogus;");
$kask->bind_result($id, $toon, $tellimiskogus, $valminudkogus);
$kask->execute();
?>
<!doctype html>
<html>
<head>
    <title>Tellimuste haldamine</title>
    <link rel="stylesheet" href="src/css/table.css">
    <link rel="stylesheet" href="src/css/global.css">
</head>
<body>
<header><h1>Mihhail Lastovski Toolivahendus</h1></header>
<?php include ('nav.php')?>

<table>
    <tr>
        <th>Tellimuse ID</th>
        <th>Toon</th>
        <th>Tellimiskogus</th>
        <th>Valminudkogus</th>
        <th>Suurendage valmis kogust</th>
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
			  <td><form action=''>
			         <input type='hidden' name='id' value='$id' />
					 <a href='?punkt=$id'>+1</a>
					 <input type='submit' value='Muuda tellimus' />
			      </form>
			  </td>
			</tr>
		  ";
    }
    ?>
</table>
</body>
</html>

