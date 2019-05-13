<?php


$end_point = "https://jsonmock.hackerrank.com/api/movies/search/?Title=Maze";
$result = file_get_contents($end_point);
$result = json_decode($result);


var_dump($result->total);


?>