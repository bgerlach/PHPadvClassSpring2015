<?php
function load_lib($base) {
    //var_dump($base);
    $baseName = explode( '\\', $base );
    $class = end( $baseName ); 
     
    include 'Views/'.$class . '.php';
    
   //var_dump($class);   
};
spl_autoload_register('load_lib');