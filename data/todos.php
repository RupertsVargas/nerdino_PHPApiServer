<?php
include_once "functions.php";

class Todos {
    public $id;
    public $name;
    public $tasks;

    function __construct($name, $tasks)
    {
        $this->id = getGUID();
        $this->name = $name;
        $this->tasks = $tasks;
    } 
}

class Tasks {
    public $id;
    public $title;
    public $done;

    function __construct($title, $done)
    {
        $this->id = getGUID();
        $this->title = $title;
        $this->done = $done;
    } 
}

function getTodos()
{
    $todos = @readData();
    if ($todos == null)
    {
        $counter = 0;
        $todos = array();

        for ($x = 0; $x < 2; $x++) {
            $name = "Test ".$x + 1;

            $tasks = array();

            for ($y = 0; $y < 3; $y++) {
                array_push($tasks, new Tasks("Task ".++$counter, $counter % 2 == 0));
            }

            array_push($todos, new Todos($name, $tasks));
        }
        writeData($todos);
    }
    return $todos;
}

function updateTask($init=false){

    // $array = ["id"=>$_GET["id"],"done"=>true,"title"=>"Task 1"];

    $todos = @readData();

    // $array = ["id"=>$_GET["id"],"done"=>$init,"title"=>"Task 1" , $todos];
    // return $array;
    // $todos[0];
    // $todes = $todos;
    for ($x = 0; $x < sizeof($todos); $x++) {
        // $name = "Test ".$x + 1;

        // $tasks = $todos[$x]["task"];
        $tasks = $todos[$x]["tasks"];

        for ($y = 0; $y < sizeof($tasks); $y++) {
            
            if($tasks[$y]["id"]==$_GET["id"] ){

                // exit;
                // $isTrue = $todos[$x]["tasks"][$y]["done"]==true ? false:true;
                $todos[$x]["tasks"][$y]["done"] = $init;
                // $tasks[$y]["done"] = "SIU";
                // die();
                // $isTrue = $tasks[$y]["done"] == true ? false : true;
                // $todos[$x]["tasks"][$y]["done"] = $isTrue;
            }
        //     // array_push($tasks, new Tasks("Task ".++$counter, $counter % 2 == 0));
        }

        // array_push($todos, new Todos($name, $tasks));
    }

    // $todos[0] = $todes;
    writeData($todos);
    $array = ["id"=>$_GET["id"],"done"=>$init,"title"=>"Task 1" , $todos];
    return $array;
    // if ($todos == null)
    // {
    //     $counter = 0;
    //     $todos = array();

    //     for ($x = 0; $x < 2; $x++) {
    //         $name = "Test ".$x + 1;

    //         $tasks = array();

    //         for ($y = 0; $y < 3; $y++) {
    //             array_push($tasks, new Tasks("Task ".++$counter, $counter % 2 == 0));
    //         }

    //         array_push($todos, new Todos($name, $tasks));
    //     }
    //     writeData($todos);
    // }
    // return $todos;

    
}

function saveTodoList($todolist)
{
    if($todolist->name == null)
    {
        return null;
    }
    $taskPre = $todolist->task;
    $taskArray = [];
    for ($i=0; $i <  sizeof($taskPre); $i++) { 
        $title = $taskPre[$i]-> name;
        $taskArray[]= new Tasks($title,false);
    }
    // $taskArray = new Tasks()

    $todos = getTodos();
    // $new = new Todos($todolist->name, array());
    $new = new Todos($todolist->name, $taskArray);
    array_push($todos, $new);
    writeData($todos);
    return $new->id;
}