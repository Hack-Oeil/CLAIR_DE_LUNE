<?php if(sizeof($_POST)){$output=[];$file=__DIR__.'/tests/_tmp_generic.code';file_put_contents($file,$_POST["code"]);switch($_POST["language"]){case "js": if(file_exists('./tests/js/try.js'))exec('node ./tests/js/try.js "'.$file.'"',$output);break;case "php": if(file_exists('./tests/php/try.php'))exec('php -c ./tests/php/php.ini ./tests/php/try.php "'.$file.'"',$output);break;case "py":if(file_exists('./tests/python/try.py'))exec('python ./tests/python/try.py "'.$file.'"',$output);break;}foreach($output as $line){if(preg_match('/^[0-9a-f]{40}$/',$line,$out))$line=base64_decode('QmllbiBqb3XDqSwgbGUgZmxhZyBlc3QgOiA=').sha1(md5($out[0].'secret'));echo $line."\n";}if(file_exists($file))unlink($file);exit();}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clair de Lune</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Nunito:wght@300&family=Poppins&family=Roboto:wght@300&display=swap"
		rel="stylesheet">
</head>
<body>

<div class="grid-container">
    <div class="left-column" id="info_challenge">
        <h1>Programmation</h1>

        <h3>💳 Clair de Lune</h3>
        <p>
            L'algorithme que vous devez développer procède en trois étapes.<br /><br />

            1)  L'algorithme multiplie par deux un chiffre sur deux, en commençant par l'avant dernier 
                et en se déplaçant de droite à gauche. Si un chiffre qui est multiplié par deux est
                plus grand que neuf (comme c'est le cas par exemple pour 8 qui devient 16), alors il
                faut le ramener à un chiffre entre 1 et 9. 
                <br /><br />
                Pour cela, il y a 2 manières de faire (pour un résultat identique) :<br />
                    - Soit les chiffres composant le doublement sont additionnés 
                       (pour le chiffre 8: on obtient d'abord 16 en le multipliant par 2 puis 
                        7 en sommant les chiffres composant le résultat : 1+6).<br />
                    - Soit on lui soustrait 9 (pour le chiffre 8 : on obtient 16 en le multipliant par 2 puis 
                        7 en soustrayant 9 au résultat).
            <br /><br />
            2) La somme de tous les chiffres obtenus est effectuée.
            <br /><br />
            
            3) Le résultat est divisé par 10. Si le reste de la division est égal à zéro, alors le nombre original est valide.
            <br /><br /><br />


            <b>Exemples de numéro valide :</b> <br />
                4539590904806371<br />
                4929733308598743<br />
                4556826101623658<br />
                4024714557803244<br />
                4539921955861413<br />
                4716951675815063<br />
                4485615395649479<br />
                4916432101927804<br />
                4532719840190346<br />
                4539753828477493

            <br />
            <hr>
            <br />
            Le retour de votre fonction <b>main</b> doit renvoyer true si le nombre original est valide, false sinon .<br />
            <br />
            <hr>
            <br />
            Si votre code est fonctionnel vous recevrez en sortie le FLAG du challenge.
        </p>
    </div>
    <div class="right-column">
        <div class="right-column-1" id="api_detail">
            <h4>Ecrire votre code en :                  
                <select id="language_choice">
                    <option value="js">Javascript</option>
                    <option value="php">PHP</option>
                    <!--<option value="py">Python</option>-->
                </select>
            </h4>
            <form>                
                <div id="editor"></div>
                <button id="btn_submit" type="button">Executer mon code</button>
            </form>
        </div>
        <div class="right-column-2" id="api_response">
            <h4>Résultat :</h4>
            <pre id="result_test"></pre>
        </div>
        <div style="display:none;">

<textarea id="default_js">
function main() {
    let response = false;
    const number = stdin();
    // votre code ici

    return response;
}</textarea>
<textarea id="default_php">
&lt;?php

function main() {
    $response = false;
    $number = stdin();
    // votre code ici
    
    
    return $response;
}</textarea>
<textarea id="default_py">
def main():
    response = False
    number = stdin()
    # votre code ici
    
    
    return response
</textarea>

        </div>
    </div>
</div>
<script src="src/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="src/mode-javascript.js" type="text/javascript" charset="utf-8"></script>
<script src="src/mode-php.js" type="text/javascript" charset="utf-8"></script>
<script src="src/mode-python.js" type="text/javascript" charset="utf-8"></script>
<script src="src/theme-twilight.js" type="text/javascript" charset="utf-8"></script>
<script src="src/ho-challenge.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>