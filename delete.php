<?php
$json = file_get_contents('todo.json');
    $jsonarray = json_decode($json, true);
    $todoname=$_POST['todo_name'];
    unset($jsonarray[$todoname]);
    file_put_contents('todo.json', json_encode($jsonarray, JSON_PRETTY_PRINT));
    header('location: index.php');
    ?>