<?php
require_once 'database.php';

$db = dbConnect();

$requestMethod = $_SERVER['REQUEST_METHOD'];
$request =substr($_SERVER['PATH_INFO'], 1);
$request = explode('/', $request);
$requestResource = array_shift($request);



if($requestResource == "isSetCookie"){
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

header('Content-Type: application/json; charset=utf-8');
header('Cache-control: no-store, no-cache, must-revalidate');
header('Pragma: no-cache');
if($requestMethod == 'POST'){
    header('HTTP/1.1 200 Created');
}else{
    header('HTTP/1.1 200 OK');
}
echo json_encode($data);
?>
