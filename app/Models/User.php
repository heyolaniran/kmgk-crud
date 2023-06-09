<?php 
namespace App\Models ; 


class User { 
    private $id ; 
    private $username; 
    private $email  ; 
    private $pass ; 
    private $role ; 
    private $status ; 
    private $arrondissement_id; 
    private $regiestred_at  ; 


    public function id() { 
        return $this->id;
    }

    public function username()
    {
        return $this->username;
    }

    public function role()
    {
        return $this->role;
    }

    public function status()
    {
        return $this->status;
    }

    public function registred_at()
    {
        return $this->regiestred_at;
    }

    public function arrondissement() { 
        return $this->arrondissement_id;
    }
}