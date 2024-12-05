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

if($requestResource == "disconnect"){
    $data = false;
    
    if($requestMethod == "GET"){
        if (isset($_COOKIE['USERSESSION'])) {
            $token = $_COOKIE['USERSESSION'];

            $data = removeSessionToken($db, null, $token);

            if($data){
                setcookie('USERSESSION', '', 0, '/', "/", true, true);
            }
        }
    }
}


?>
