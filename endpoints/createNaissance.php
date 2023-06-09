<?php
include "../vendor/autoload.php"; 

use App\Controllers\Naissances; 

if($_SERVER["HTTP_ORIGIN"] !== Naissances::BASE_URL)
    {
        echo json_encode(["status"=>false, "message" => "Opération interdite"]); 
        die(); 
    }


    $statement ="" ; 
    foreach($_POST as $key=>$value) { 
        $statement .= "'$value'," ; 
    }
    echo var_dump($_POST) . "\n" ; 
    echo $statement . "\n"; 
    $statement = rtrim($statement , ',') ; 
    echo $statement ; 
    $record =  Naissances::create($statement) ; 

    if($record !== false) { 
        echo json_encode(['status' => true ]) ; 
    }else 
    echo json_encode(['status' => false])  ; 