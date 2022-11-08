<?php

class WeatherForecasts {
    public $date;
    public $temperatureC;
    public $MinTemperatureC;
    public $MaxTemperatureC;
    public $MinTemperatureF;
    public $MaxTemperatureF;

    public $temperatureF;
    static $url =  '../../data/ApplicationDbContextSeed.json';

    // function __construct($date, $temperatureC)
    // {
    //     $this->date = $date;
    //     $this->temperatureC = $temperatureC;
    //     // $this->temperatureMin = 
    //     $this->temperatureF = 32 + (int)($temperatureC / 0.5556);
    // } 

    function __construct($date, $MinTemperatureC,$MaxTemperatureC)
    {
        $this->date = $date;
        // $this->temperatureC = $temperatureC;
        $this->MinTemperatureC = $MinTemperatureC;
        $this->MaxTemperatureC = $MaxTemperatureC;
        $this->temperatureC =  $MinTemperatureC."/".$MaxTemperatureC;


        // 32 + (int)($temperatureC / 0.5556);
        $this->MinTemperatureF = 32 + (int)($MinTemperatureC / 0.5556);
        $this->MaxTemperatureF = 32 + (int)($MaxTemperatureC / 0.5556);
        $this->temperatureF = $this->MinTemperatureF."/". $this->MaxTemperatureF;
    } 

    static function createJson($array){
        $json_string = json_encode($array,JSON_PRETTY_PRINT);
        $file = WeatherForecasts::$url;
        file_put_contents($file, $json_string);
    
    }
    static function readJson(){
        $file = WeatherForecasts::$url;
        $datos_clientes = file_get_contents($file);
        return $datos_clientes;
    }
}

function getWeatherForecasts()
{
    date_default_timezone_set("America/Mexico_City");

    $weatherForecasts = array();
    $weatherForecasts1 = array();
    $weatherForecasts2 = array();
    

    for ($x = 0; $x < 10; $x++) {
        $dateTime = strtotime("+".$x." Days");

        $a = rand(30,40);
        $b = rand(30,40);

        $ran1= $a >= $b ? $a : $b;
        $ran2= $a <= $b ? $a : $b;

        $arrayTest = new WeatherForecasts(date("Y-m-d H:i:s", $dateTime) , $ran2,$ran1);
        // array_push($weatherForecasts1, new WeatherForecasts(date("Y-m-d H:i:s", $dateTime) , rand(30,40)));
        // array_push($weatherForecasts2, new WeatherForecasts(date("Y-m-d H:i:s", $dateTime) , rand(30,40)));
        // $dateOnly = date("Y-m-d", $dateTime);
        // $weatherForecasts[$dateOnly] = [$weatherForecasts1,$weatherForecasts2];
        // array_push($weatherForecasts, new WeatherForecasts(date("Y-m-d H:i:s", $dateTime) , rand(30,40)));
        array_push($weatherForecasts, $arrayTest);
    }

    // for ($x = 0; $x < 10; $x++) {
    //     $dateTime = strtotime("+".$x." Days");
    //     array_push($weatherForecasts2, new WeatherForecasts(date("Y-m-d H:i:s", $dateTime) , rand(30,40)));
    // }
    

    
    // if(!WeatherForecasts::readJson($weatherForecasts)){
    //         WeatherForecasts::createJson([$weatherForecasts]);
            
    // }else{

    // }
    
    WeatherForecasts::createJson([$weatherForecasts]);

    return $weatherForecasts;
}

