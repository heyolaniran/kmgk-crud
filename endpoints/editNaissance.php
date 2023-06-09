<?php
    include "../vendor/autoload.php" ; 

    
    use App\Controllers\Naissances; 

    if($_SERVER["HTTP_ORIGIN"] !== Naissances::BASE_URL)
    {
        echo json_encode(["status"=>false, "message" => "Opération interdite"]); 
        die(); 
    }

    $statement = "" ; 

    foreach($_POST as $key => $value) { 
        if($key !== "id"){ 
            $statement .= "$key='$value'," ; 
        }
    }

   $statement = rtrim($statement , ',') ; 

   $update = Naissances::update($statement , $_POST['id']) ; 

   if($update !== false)
   echo json_encode(['status' => true]) ; 
   else 
    echo json_encode(['status' => false  , "message" => "Modification non effectuée"]) ; 
    
    
    
    
    
    
    
    
    
    
    
    
    
?> 






