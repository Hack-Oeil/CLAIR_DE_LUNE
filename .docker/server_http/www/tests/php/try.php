<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'controlCode.php';
try{
    $nbTests = 100;
    $badResponse = false;
    $returnData= [];
    
    if(file_exists($argv[1])) {
        require_once $argv[1];
    }

    // Exécuter le code dans la VM
    for($i = 0; $i < $nbTests; $i++) {       
        $returnData[$i] = hoTryCode();
        if($returnData[$i] !== true) {
            $badResponse = true;
        }
        $returnData[$i] = 'Test '.($i+1).' '.$returnData[$i];
    }
    
    // si il n'y a pas de mauvaise réponse on peut donner le flag
    if($badResponse !== true) {
        echo '4436af2175bff5ffb511ce1c7070a5beab71220b';
    } else {
        echo print_r($returnData, true);
    }
}
catch(Error $error) { echo "Il y a une erreur dans votre code\n"; }