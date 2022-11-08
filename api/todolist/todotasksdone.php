<?php
include_once "../cors.php";
// $todolist = json_decode(file_get_contents("php://input"));
include_once "../../data/todos.php";


// $id = saveTodoList($todolist);
header('Content-type: application/json');
echo json_encode(updateTask(true));
