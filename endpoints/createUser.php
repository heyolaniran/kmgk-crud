<?php
include "../vendor/autoload.php"; 

use App\Controllers\Users; 
$email = htmlentities($_POST['email']) ; 
$pass = $_POST['pass'] ; 
$arrondissement = $_POST['select'] ; 
$role = htmlentities($_POST['role']) ; 

if($_SERVER["HTTP_ORIGIN"] !== Users::BASE_URL)
    {
        echo json_encode(["status"=>false, "message" => "Opération interdite"]); 
        die(); 
    }

    $exist = Users::checkMail($email) ; 
    if($exist === true) { 
        echo json_encode(["status" => false, "message" => "Ce mail est pris"]) ; 
        die() ; 
    }

    $record = Users::create($email , $pass , $arrondissement , $role) ; 

    if($record !==false) { 
        echo json_encode(['status' => true , "message" => "Utilisateur crée"]) ; 
    }else { 
        echo json_encode(['status' => true , "message" => "erreur creation"]) ; 
    }