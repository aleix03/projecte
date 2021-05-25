<?php

$directori = "./";
if (strlen($_GET['obtenir_directori_usuari']) > 0){$directori = "/var/www/aecompany/usuaris/" . $_GET['obtenir_directori_usuari'];}
llistar_directoris($directori);

function llistar_directoris($nom) {
    $ruta = realpath($nom);
    $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($ruta, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CATCH_GET_CHILD);
    foreach($objects as $nom => $object){
        if (filetype($nom) == "dir") {
            print "<br/><a style='display:block;' href='javascript:void' onClick='do_it(\"" . $ruta . "/" . basename($nom) . "\")'><b>" . basename($nom) . "</b></a>";
        } else {
            print "<br/><a style='display:block;'><b>" . basename($nom) . "</b></a>";
        }
    }
}

?>
