<?php
include_once "../cors.php";
include_once "../../data/weatherforecasts.php";
$weatherForecasts = getWeatherForecasts();
header('Content-type: application/json');
echo json_encode($weatherForecasts);