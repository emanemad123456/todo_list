<?php
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';


$todoname = $_POST["todo_name"] ?? '';
$todoname = trim($todoname);
if(isset($todoname)){
    if(file_exists('todo.json')){
    $json = file_get_contents('todo.json');
    $jsonarray = json_decode($json, true);
}else $jsonarray=[];
    // echo "<pre>";
    // print_r($jsonarray);
    // echo "</pre>";
    $jsonarray[$todoname] = ['completed' => false];
    file_put_contents('todo.json', json_encode($jsonarray, JSON_PRETTY_PRINT));
}
header('location: index.php');
?>