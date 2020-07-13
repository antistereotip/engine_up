<?php
require_once 'db.php';
 
try {
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
echo "Connected to $dbname at $host successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>
<hr />
<?php
	$pdo_statement = $conn->prepare("SELECT * FROM posts ORDER BY id DESC");
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
	
	if(!empty($result)) { 
		foreach($result as $row) {
?>

<p><?php echo $row["id"]; ?></p> 
<p><?php echo $row["post"];  ?></p>
<p><?php echo $row["email"];  ?></p>
<p><?php echo $row["author"];  ?></p><hr />
<?php
								}
						}
?>
