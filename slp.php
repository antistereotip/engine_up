<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	body {background:#111; color: #17f117;}
	a {color: yellow;}
	a:hover {color: orangered;}
	
	</style>
</head>


<body>



<!-- php -->
<?php
//die('access denied');
//TO DO: pripremiti mysql bazu 
$s = "localhost";
$u = "antister_base";
$p = "v0l1md4p0m3r4mp1x3l3";
 	 
 	try {
 	#-- konekcija na bazu --#
 	$c= new PDO("mysql:host=$server;dbname=antister_base", $u, $p);
 	#-- setuj PDO error mode --#
 	$c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 		echo "<p>enter unique command</p>";
 	}
 	catch(PDOException $e)
 	{
 	echo "Konekcija neuspela: " . $e->getMessage();
 	
        }
        l1st($c);
        echo '<hr/>';

	#--- ova funkcija lista unikatno ime, kategoriju  i kratak opis iz tabele ng1np ---#
	function l1st($c) {
	#-- $q = 'SELECT unique_name, category, short_desc FROM ng1np ORDER BY unique_name'; --#
	$q = 'SELECT unique_name FROM ng1np ORDER BY unique_name';
	echo 'unique: ';
    		foreach ($c->query($q) as $r) {
        		echo '<a href="./ng1np.php?q='.$r[unique_name].'">'.$r[unique_name].'</a>'."\t";
        		#-- print $r['category'] . "\t"; --#
        		#-- print $r['short_desc'] . "\n<br>"; --#
    		}
	}
		

	
	echo '<form id="searchbox" action="" method="GET">
    	<input id="search" type="text" placeholder="Type here" name="q">
    	<input id="submit" type="submit" value="Search">
	</form><br>';
	$q = $c->prepare("SELECT * FROM ng1np WHERE unique_name = ?");
	if ($q->execute(array($_GET['q']))) {
  		while ($r = $q->fetch()) {
    		echo 'Unique Name: '.$r[unique_name].'<br>';
			echo 'Category: '.$r[category].'<br>';
			echo 'Short Description: '.$r[short_desc].'<br>';
  		}
	}



	 
?>







<!-- end php -->



</body>
</html>



