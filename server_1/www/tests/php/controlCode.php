<?php
$currentResponse = false;

function luhnValidation($code)
{
    $numbers = array_reverse(str_split($code));
    $total = 0;
    foreach($numbers as $key => $number) {
        if($key%2 != 0) $number *= 2;
        $total += ($number > 9 ? $number-9 : $number);
    }
    return ($total%10 == 0 ? true : false);
}

// fonction obligatoire
function stdin() {
    global $currentResponse;
    $code = substr(str_shuffle(str_repeat("123456789", 50)), 0, 15);
    $currentResponse = luhnValidation($code);
    return $code;
}

// fonction obligatoire
function hoTryCode() {
    global $currentResponse;
    if (function_exists('main')) {
        try {
            $returnBoolean = main();
            if ($returnBoolean === $currentResponse) {
                return true;
            } else {
                return "Votre code ne correspond pas à l'algorithme attendu.";
            }
        } catch (Exception $e) {
            return "Il y a une erreur dans votre code : " . $e->getMessage();
        }
    } else {
        return 'Error function main not found';
    }
}