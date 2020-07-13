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
	
	$sql = ("INSERT INTO posts ( email, post, date ) VALUES ( :email, :post, :date )");
	$pdo_statement = $konekcija->prepare($sql);
	$pdo_statement->execute();
	
		
	$result = $pdo_statement->execute( array(  ':email'=>$_POST['email'], ':post'=>$_POST['post'], ':date'=>$_POST['date'] ) );
	if (!empty($result) ){
	  header('location:add.php');
	}
}
?>
<html>
<head>
<title>PHP PDO CRUD - Add New Record</title>
<style>

</style>
</head>
<body>
<a href="index.php" class="button_link">Back to List</a>
<div>
<h1>Add New Record</h1>
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
	  <label>Date: </label><br>
	  <input type="date" name="date" required />
  </div>
  <div>
	  <input name="add_record" type="submit" value="Add">
  </div>
  </form>
</div> 
</body>
</html>
