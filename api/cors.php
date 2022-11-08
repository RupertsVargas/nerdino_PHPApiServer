<?php
// $allowedDomain = "http://localhost:3000";
$allowedDomain = "*";

header("Access-Control-Allow-Origin: $allowedDomain");
header("Access-Control-Allow-Headers: content-type");
header("Access-Control-Allow-Methods: OPTIONS,GET,PUT,POST,DELETE");
