<?php
require_once 'database.php';

$db = dbConnect();

$requestMethod = $_SERVER['REQUEST_METHOD'];
$request =substr($_SERVER['PATH_INFO'], 1);
$request = explode('/', $request);
$requestResource = array_shift($request);

if($requestResource == "login"){
    $data = false;

    if($requestMethod == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $data = connectionAccount($db, $email, $password);
        if($data){

            // Generate a token
            $token = bin2hex(random_bytes(16));
            $token_hash = hash('sha256', $token);
            $expirationDate = strtotime('+1 days', strtotime(gmdate('Y-m-d H:i:s', time())));
           
            insertSessionToken($db, $email, $token_hash);
            setcookie('USERSESSION', $token_hash, $expirationDate, '/', "/", true, true);
        }
    }


}

if($requestResource == "resetName"){
    $data = false;

    if($requestMethod == "POST"){
        $name = $_POST['email'];





    }
}
?>
