<?php 
namespace App\Models ; 


class Naissance { 
    private $id ; 
    private $prenom ; 
    private $sexe ; 
    private $fullname_pere; 
private $fullname_mere; 
private $age_pere ; 
private $age_mere ; 
private $domicile_pere; 
private $domicile_mere; 
    private $nom_declarant ; 
    private $arrondissement_id ; 
    private $created_by ; 
    private $created_at ; 
    private $status ; 
    public function  id() {
        return $this->id;
    }
public function  prenom() {
    return $this->prenom;
}

public function nom_declarant() { 
    return $this->nom_declarant;
}
public function  sexe() {
    return $this->sexe;
}
public function  fullname_pere() {
    return $this->fullname_pere;
}
public function  fullname_mere() {
    return $this->fullname_mere;
}
public function  age_pere() {
    return $this->age_pere;
}
public function  age_mere() {
    return $this->age_mere;
}

public function  domicile_pere() {
    return $this->domicile_pere;
}

public function  domicile_mere() {
    return $this->domicile_mere;
}

public function arrondissement() {
    return $this->arrondissement_id;
}

public function createdBy() { 
    return $this->created_by;
}

public function createdAt() { 
    return $this->created_at;
}

public function status() { 
    return $this->status;
}



}