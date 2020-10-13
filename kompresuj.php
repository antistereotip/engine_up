<?php 
ob_start("minifier"); 
function minifier($code) { 
    $search = array( 
          
        // Remove whitespaces after tags 
        '/\>[^\S ]+/s', 
          
        // Remove whitespaces before tags 
        '/[^\S ]+\</s', 
          
        // Remove multiple whitespace sequences 
        '/(\s)+/s', 
          
        // Removes comments 
        '/<!--(.|\s)*?-->/'
    ); 
    $replace = array('>', '<', '\\1'); 
    $code = preg_replace($search, $replace, $code); 
    return $code; 
} 
?> 

<ul>
			<li><a href="#programming">Programiranje</a></li>
			<li><a href="#algorithms">Algoritmi</a></li>
			<li><a href="#matrix">Matrice</a></li>
			<li><a href="#design">Dizajn</a></li>
</ul>


<?php 
ob_end_flush(); 
?> 
