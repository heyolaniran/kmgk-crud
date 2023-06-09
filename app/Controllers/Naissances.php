<?php 
namespace App\Controllers; 
use PDO ; 
use App\DataBase\DBconnect ; 
use App\Models\Naissance ; 
use DateTime ; 
class Naissances { 
    private $db ; 
    private static $table = "acte_naissances" ; 
    const BASE_URL = "http://kamgoko-test.test" ; 

    public function __construct()
    { 
        $this->db = DBconnect::Connect();
    }

    public static function all() { 
            $table = self::$table ; 

            return (new self)->db 
            ->query("SELECT $table.* FROM $table INNER JOIN users  ON $table.created_by = users.id WHERE $table.status=true ")
            ->fetchAll(PDO::FETCH_CLASS, Naissance::class) ; 
    }
    public static function allByArrondissement($arrondissement_id) { 
        $table = self::$table ; 

        return (new self)->db 
        ->query("SELECT $table.* FROM $table INNER JOIN users  ON $table.created_by = users.id WHERE arrondissement_id = $arrondissement_id AND status = true ")
        ->fetchAll(PDO::FETCH_CLASS , Naissance::class) ; 
}

    public static function exist($id) { 
        $table = self::$table ; 
    }

    public static function get($id) { 
        $table = self::$table ; 

        return (new self)->db
        ->query("SELECT * FROM $table WHERE id = $id")
        ->fetchAll(PDO::FETCH_CLASS , Naissance::class)[0] ; 
    }

    public static function create($statement) { 
            $table = self::$table ; 
            $created_at = (new DateTime())->format("Y-m-d H:i:s"); 
            $statement.=",'$created_at' , true" ; 
            return (new self)->db
            ->query("INSERT INTO $table VALUES(NULL , $statement)") ; 
    }

    public static function update($statement, $id) { 
        $table = self::$table ; 

        return (new self)->db
        ->query("UPDATE $table SET $statement WHERE id = $id") ; 
    }

    public static function delete($naissance_id) { 
        $table = self::$table ; 
        return (new self)->db
        ->query("UPDATE $table SET status=false WHERE id = $naissance_id") ; 
    }

 


}