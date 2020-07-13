<?php
require_once 'db.php';
 
try {
$konekcija = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
// echo "Connected to <b> $dbname </b>  at <b> $host </b> successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>
<hr />
<?php
	$pdo_statement = $konekcija->prepare("SELECT * FROM posts ORDER BY id DESC");
	$pdo_statement->execute();
	$rezultat = $pdo_statement->fetchAll();
	
	if(!empty($rezultat)) { 
		foreach($rezultat as $kolona) {
?>

<p><?php //echo $kolona["id"]; ?></p> 
<p><?php echo $kolona["email"];  ?></p>
<p><pre><?php echo $kolona["post"];  ?></pre></p>
<p><?php echo $kolona["date"];  ?></p><hr />
<?php
		}
	}
?>
<a href="add.php">Add post</a>
