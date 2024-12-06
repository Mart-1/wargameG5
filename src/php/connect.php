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
            setcookie('USERSESSION', $token_hash, $expirationDate, '/', "localhost", true, true);
        }
    }
}
if($requestResource == "register"){
    $data = false;
    if($requestMethod == "POST"){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $data = registerAccount($db, $firstname, $lastname, $email, $password_hash);
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
