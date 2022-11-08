<?php
include_once "../cors.php";
$todolist = json_decode(file_get_contents("php://input"));
include_once "../../data/todos.php";
$id = saveTodoList($todolist);
header('Content-type: application/json');

// var_dump($todolist);
echo json_encode($id);
