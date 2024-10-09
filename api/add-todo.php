<?php 
    // % ho qualcosa ricevuto via post nella chiave title ?
    if ( isset($_POST["title"]) && !empty($_POST["title"]) ){
        // # e nella chiave done? se c'e' usala, altrimenti inizializza done come false

        // # recupero i dati nel file dischi.json
        // % se sono scritti in un formato diverso da json trovo il modo di convertirli
        $fileContent = file_get_contents("db/todolist.json");
        
        // # converto il file json appena recuperato in un array associativo in php
        $todoList = json_decode($fileContent, true); // # decofico il json in un array associativo in php

        // ! prendo il dato ricevuto e lo inserisco nella lista appena recuperata da todolist.json
        $newTodoItem = [
            "title" => $_POST["title"],
            "done" => false,
        ];

        // % trasformo i dati come voglio (aggiungo il nuovo todo item)
        $todoList[] = $newTodoItem; // ! array_push($todoList, $newTodoItem);

        // # converto il mio array associativo modificato in json
        $newTodoListJson = json_encode($todoList);

        // ! salvo i dati sovrascrivendo il file di prima
        file_put_contents("db/todolist.json", $newTodoListJson);

        // * rispondo dicendo che e' tutto okay
        http_response_code(200);
    }  else {
        http_response_code(400);
    }
?>