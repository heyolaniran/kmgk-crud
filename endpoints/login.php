<?php
include "../vendor/autoload.php"; 

use App\Controllers\Users; 
$email = htmlentities($_POST['email']) ; 
$pass = $_POST['pass'] ; 

if($_SERVER["HTTP_ORIGIN"] !== Users::BASE_URL)
    {
        echo json_encode(["status"=>false, "message" => "Opération interdite"]); 
        die(); 
    }

    $result =  Users::login($email , $pass) ; 

    if($result !== false) {
        session_start(); 
        $_SESSION['user'] = $result; 
    
        echo json_encode(['status' => true]); 
    }else 
    echo  json_encode(['status' => false, "message" => "aucun utilisateur retrouvé"]);  