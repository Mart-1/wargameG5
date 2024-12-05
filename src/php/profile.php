<?php
require_once 'database.php';

$db = dbConnect();

$requestMethod = $_SERVER['REQUEST_METHOD'];
$request =substr($_SERVER['PATH_INFO'], 1);
$request = explode('/', $request);
$requestResource = array_shift($request);

if($requestResource == "getProfile"){
    $data = false;
    if($requestMethod == "GET"){
        $userCookie = $_COOKIE['USERSESSION'];

        $userMail = getUserMail($db, $userCookie);

        $data = getUserProfile($db, $userMail);

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
