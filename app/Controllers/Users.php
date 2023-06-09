<?php 
namespace App\Controllers ; 
use PDO; 
use DateTime ; 
use App\DataBase\DBconnect ; 
use App\Models\User ; 
class Users { 

    private $db ; 
    private static $table = "users" ; 
    const BASE_URL = "http://kamgoko-test.test" ; 
    public function __construct()
    { 
        $this->db = DBconnect::Connect();
    }


    public static function all() { 
    
    }

    public static function infos($id) { 
        $table = self::$table ; 

        return (new self)->db
        ->query("SELECT username ,  email , role , status, arrondissement_id FROM $table WHERE id = $id")
        ->fetchAll(PDO::FETCH_CLASS , User::class)[0] ; 
    }

    public static function create($email , $pass , $arrondissement , $role) { 
        $username = "Utilisateur" ; 
        $date = (new DateTime())->format("Y-m-d H:i:s") ; 
        $table = self::$table; 
        $pass = \password_hash($pass, PASSWORD_BCRYPT); 
        return (new self)->db
        ->query("INSERT INTO $table VALUES(NULL , '$username', '$email', '$pass' , '$role' , $arrondissement, '$date' , NULL , 1)") ; 
    }

    public static function resetPass() { 

    }

    public static function nominateUser() { 

    }

    public static function demonimateUser() { 

    }

    public function findUser() { 
        
    }

    public static function login($email , $pass) { 
        if(!self::checkMail($email)) { 
            return false ;
        }

        $exist = \password_verify($pass,  self::getHashedPass($email)); 
        if($exist == true) 
        return self::idByMail($email);
       else 
        return false; 
    }

    private static function getHashedPass($email)
    {

        $table = self::$table;

        return (new self)->db 

        ->query("SELECT pass FROM $table WHERE email = '$email'")

        ->fetch(PDO::FETCH_OBJ)

        ->pass; 

    }

    public static function idByMail($email)
    {

        $table = self::$table;



        $id = (new self)->db

        ->query("SELECT  id

                        FROM $table 

                        WHERE email = '$email' ")

        ->fetch(PDO::FETCH_OBJ)

        ->id; 

        return (int)$id ; 

    

    }


    public static function checkMail($email)
    {

        //verify mail exists in Database

        $table = self::$table;

        $result = (new self)->db

        ->query("SELECT count(id) as exist FROM $table WHERE email='$email'")

        ->fetch(PDO::FETCH_OBJ)

        ->exist; 

        return (bool)$result ; 

    }
}

