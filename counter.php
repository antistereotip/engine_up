
<?php
defined('ROOT_DIR') or exit('No direct script access allowed');
// Add correct path to your counter.txt file.
$path = (ROOT_DIR .'include/counter.txt');
// Opens counter.txt to read the number of hits.
$file  = fopen( $path, 'r' );
$count = fgets( $file, 1000 );
fclose( $file );

// Update the count.
$count = abs( intval( $count ) ) + 1;

// Output the updated count.
echo "<strong style='color: #fff;'> {$count} </strong> all pages hits\n";

// Opens counter.txt to change new hit number.
$file = fopen( $path, 'w' );
fwrite( $file, $count );
fclose( $file );
