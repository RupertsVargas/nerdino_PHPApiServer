<?php
include_once "../cors.php";
include_once "../../data/todos.php";
$todos = getTodos();
header('Content-type: application/json');
echo json_encode($todos);