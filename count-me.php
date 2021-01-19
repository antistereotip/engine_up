<style>
.centar {
  text-align: center;
  font-size: 5em;
  padding-top: 25%;
}


</style>
<?php

// Add correct path to your countlog.txt file.
$path = '/inc/counter.txt';

// Opens countlog.txt to read the number of hits.
$file  = fopen( $path, 'r' );
$count = fgets( $file, 1000 );
fclose( $file );

// Update the count.
$count = abs( intval( $count ) ) + 1;

// Output the updated count.
echo "<div class='centar'>";
echo "{$count} hits\n";
echo "</div>";
// Opens countlog.txt to change new hit number.
$file = fopen( $path, 'w' );
fwrite( $file, $count );
fclose( $file );
