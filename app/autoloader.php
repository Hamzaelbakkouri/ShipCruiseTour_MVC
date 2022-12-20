<?php
spl_autoload_register('myAutoLoader');

    function myAutoLoader ($className) {
    $path = "app/Models/";
    $extension = ".php";
    $fullPath = $path . $className . $extension;
    include_once $fullPath;
    

    $array_paths = array(
        'app/Models/',
        'app/Controllers/',
        'app/Views/'
    );
    $parts = explode('\\',$className);
    $name = array_pop($parts);
    foreach($array_paths as $path){
        $file = sprintf($path."%s.php",$name);
        if(file_exists($file)){
            require_once($file);

        }
   }
}