<?php

include 'constants.php';

function dbConnect(){
    $dsn = 'pgsql:dbname='.DB_NAME.';host='.DB_SERVER.';port='.DB_PORT;
    try {
        $conn = new PDO($dsn, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        // echo 'Connexion échouée : ' . $e->getMessage();
        return false;
    }
    return $conn;
}

function connectionAccount($conn, $email, $encodedPasswd) {
    try{
        $sql = "SELECT * FROM utilisateurs WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            if (password_verify($encodedPasswd, $result['password'])) {
                return $result;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
    catch(PDOException $e) {
        // echo "Error: " . $e->getMessage();
        return false;
    }
}

function insertSessionToken($conn, $email, $token){
    try{
        $sql = "UPDATE utilisateurs
                SET session_token = :token
                WHERE email = :email";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':token', $token);
        $stmt->bindValue(':email', $email);

        $stmt->execute();

        return true;
    }
    catch(PDOException $e) {
        // echo "Error: " . $e->getMessage();
        return false;
    }
}

function removeSessionToken($conn, $token){
    try{
        $sql = "UPDATE utilisateurs
                SET session_token = NULL
                WHERE session_token = :token";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':token', $token);

        $stmt->execute();

        return true;

    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function registerAccount($conn, $firstname, $lastname, $email, $password){
    try{
        $sql = "INSERT INTO utilisateurs (prenom, nom, email, password) VALUES (:firstname, :lastname, :email, :password)";
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':firstname', $firstname);
        $stmt->bindValue(':lastname', $lastname);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);

        $stmt->execute();

        return true;
    }
    catch(PDOException $e) {
        // echo "Error: " . $e->getMessage();
        return false;
    }
}

function getLastname($conn, $session_token){
    try{
        $sql = "SELECT nom FROM utilisateurs WHERE session_token = :session_token";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':session_token', $session_token);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $row["nom"];
        }
        else {
            return false;
        } 
    }
    catch(PDOException $e) {
        // echo "Error: " . $e->getMessage();
        return false;
    }
}

function getFirstname($conn, $session_token){
    try{
        $sql = "SELECT prenom FROM utilisateurs WHERE session_token = :session_token";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':session_token', $session_token);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $row["prenom"];
        }
        else {
            return false;
        }
    }
    catch(PDOException $e) {
        // echo "Error: " . $e->getMessage();
        return false;
    }
}

function getUserMail($conn, $session_token) {
    try {
        $sql = "SELECT email FROM utilisateurs WHERE session_token = :session_token";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':session_token', $session_token);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            return $result[0]['email']; // Retourne l'email
        } else {
            return null;
        }
    } catch (PDOException $e) {
        // echo "Error: " . $e->getMessage();
        return false;
    }
}

function getUserProfile($conn, $email) {
    try {
        // Construire la requête SQL directement avec l'email fourni
        $sql = "SELECT * FROM utilisateurs WHERE email = '$email'";

        // Exécuter la requête SQL
        $stmt = $conn->query($sql);

        // Récupérer les résultats
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        } else {
            return $result;
        }
    } catch (PDOException $e) {
        // echo "Error: " . $e->getMessage();
        return false;
    }
}



function updateFirstname($conn, $email, $firstname){
    try{
        $sql = "UPDATE utilisateurs SET prenom = :prenom WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':prenom', $firstname);
        $stmt->bindValue(':email', $email);

        $stmt->execute();

        return true;
    }
    catch(PDOException $e) {
        // echo "Error: " . $e->getMessage();
        return false;
    }
}

function updateUserInfo($conn, $email, $lastname, $firstname, $password){
    try{
        $sql = "UPDATE utilisateurs SET nom = :nom, prenom = :prenom, password = :password WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':nom', $lastname);
        $stmt->bindValue(':prenom', $firstname);
        $stmt->bindValue(':password', $password);
        $stmt->bindValue(':email', $email);
    
        $stmt->execute();

        return true;
    }
    catch(PDOException $e) {
    // echo "Error: " . $e->getMessage();
        return false;
    }
}

function updateLastname($conn, $email, $lastname){
    try{
        $sql = "UPDATE utilisateurs SET nom = :nom WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':nom', $lastname);
        $stmt->bindValue(':email', $email);

        $stmt->execute();

        return true;
    }
    catch(PDOException $e) {
        // echo "Error: " . $e->getMessage();
        return false;
    }
}

function updatePassword($conn, $email, $password){
    try{
        $sql = "UPDATE utilisateurs SET password = :password WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':password', $password);
        $stmt->bindValue(':email', $email);

        $stmt->execute();

        return true;
    }
    catch(PDOException $e) {
        // echo "Error: " . $e->getMessage();
        return false;
    }
}

function updateProfilepicture($conn, $email, $profilepicture){
    try{
        $sql = "UPDATE utilisateurs SET profilepicture = :profilepicture WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':profilepicture', $profilepicture);
        $stmt->bindValue(':email', $email);

        $stmt->execute();

        return true;
    }
    catch(PDOException $e) {
        // echo "Error: " . $e->getMessage();
        return false;
    }
}