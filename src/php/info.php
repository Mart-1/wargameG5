<?php
require_once 'database.php';

$db = dbConnect();

$requestMethod = $_SERVER['REQUEST_METHOD'];
$request =substr($_SERVER['PATH_INFO'], 1);
$request = explode('/', $request);
$requestResource = array_shift($request);



if($requestResource == "cookieCheck"){
    $data = false;

    if($requestMethod == "GET"){
        if(isset($_COOKIE['USERSESSION'])){
            $data = true;
        }
        else {
            $data = false;
        }
    }
}




?>
