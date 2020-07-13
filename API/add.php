<?php
require_once("db.php");
try {
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//echo "Connected to <b> $dbname </b>  at <b> $host </b> successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>

<?php
if(!empty($_POST["add_record"])) {
	
	$sql = ("INSERT INTO posts ( post, email, author ) VALUES ( :post, :email, :author )");
	$pdo_statement = $conn->prepare($sql);
	$pdo_statement->execute();
	
		
	$result = $pdo_statement->execute( array( ':post'=>$_POST['post'], ':email'=>$_POST['email'], ':author'=>$_POST['author'] ) );
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
	  <label>Post: </label><br>
	  <textarea name="post" rows="5" required ></textarea>
	  
  </div>
  <div>
	  <label>Email: </label><br>
	  <input type="text" name="email" required />
  </div>
  <div>
	  <label>author: </label><br>
	  <input type="date" name="author" required />
  </div>
  <div>
	  <input name="add_record" type="submit" value="Add">
  </div>
  </form>
</div> 
</body>
</html>
