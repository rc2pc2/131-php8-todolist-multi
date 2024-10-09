<?php 
    
    // # recupero i dati nel file dischi.json
    // % se sono scritti in un formato diverso da json trovo il modo di convertirli
    // credits https://codepen.io/cfleschhut/pen/kyrvxd
    $fileContent = file_get_contents("db/todolist.json");
    
    // ! altrimenti li stampo in pagina avvertendo attraverso i response headers che si tratti di un json
    header("Content-Type: application/json");
    echo $fileContent;

?>