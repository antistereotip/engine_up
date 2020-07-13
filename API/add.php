<?php
require_once("db.php");
try {
$konekcija = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//echo "Connected to <b> $dbname </b>  at <b> $host </b> successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>

<?php
if(!empty($_POST["add_record"])) {
	
	$sql = ("INSERT INTO posts ( post, email, author ) VALUES ( :email, :post, :author )");
	$pdo_statement = $konekcija->prepare($sql);
	$pdo_statement->execute();
	
		
	$rezultat = $pdo_statement->execute( array( ':email'=>$_POST['email'], ':post'=>$_POST['post'],  ':author'=>$_POST['author'] ) );
	if (!empty($rezultat) ){
	  header('location:add.php');
	}
}
?>
<html>
<head>
<title>Dodaj novi zapis</title>
<style>

</style>
</head>
<body>
<a href="index.php" class="button_link">Nazad na listu</a>
<div>
<h1>Dodaj novi zapis</h1>
<form name="frmAdd" action="" method="POST">
  
  <div>
	  <label>Email: </label><br>
	  <input type="text" name="email" required />
  </div>
  <div>
	  <label>Post: </label><br>
	  <textarea name="post" rows="5" required ></textarea>
	  
  </div>
  <div>
	  <label>Autor: </label><br>
	  <input type="date" name="author" required />
  </div>
  <div>
	  <input name="add_record" type="submit" value="Add">
  </div>
  </form>
</div> 
</body>
</html>
