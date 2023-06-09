<?php 
if(!isset($_GET['id']) || empty($_GET['id']))
{
    header("Location:  /naissances") ; 
}
    include "../layouts/real/header.php" ; 
    include "../vendor/autoload.php" ; 
    $acte_id = $_GET['id'] ; 

    use App\Controllers\Naissances ; 

    @$acte = Naissances::get($acte_id) ; 

    if((bool)$acte === false) { 
        echo '<script>window.location.href="/naissances"</script>' ; 
    }

    if(filter_has_var(INPUT_POST, "print")) { 

    }

?>

<div class="container ">
    <div class="card shadow mb-4" id="details">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> <?= $acte->prenom() . "-". $acte->sexe()?></h6>
        </div>
        <div class="card-body container-fluid">
        <h4>Pere de l'enfant  : <?= $acte->fullname_pere() ?></h4>
        <h4>Mère de l'enfant : <?= $acte->fullname_mere() ?></h4>
                  
                    <h4>Adresse des parents : (mere , pere ) </h4>
                    <h5><?= $acte->domicile_mere() ." , ". $acte->domicile_pere()?></h5>

                    <h4>Nom du déclarant : <?= $acte->nom_declarant() ?></h4>
                    <h4> Arrondissement  : <?= $acte->arrondissement() ?>e Arrondissement  </h4>
                    <h4> Fait le   : <?= $acte->createdAt() ?>  </h4>
                    
                <hr>
                <div class="justify-content-end d-flex m-1">
                    <a href="/naissances/" class="btn btn-secondary ">Retour</a>
                    <button id="editAction" class="btn btn-primary ml-2">Editer</button>
                    <form action="" method="post">
                        <button name="print" class="btn btn-secondary ml-2"> <i class="fa fa-download" aria-hidden="true"></i> Telecharger </button>
                    </form>
                </div>
        </div>
    </div>
    <div id="editForm">
    <form class="user">
            <div class="form-group">
                    <input type="text" value="<?= $acte->prenom() ?>" class="form-control form-control-user" id="prenom"
                        placeholder="Nom de l'enfant ">
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleFormControlSelect1 text-sm " >Sexe</label>
                        <select class="form-control form-control-user" id="sexe" >
                        <option value="masculin" <?= $acte->sexe() == "masculin"? "selected" : "" ?>>Masculin</option>
                        <option value="feminin" <?= $acte->sexe() == "feminin"? "selected" : "" ?>>Feminin</option>
                        
                        </select>
                    </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" value="<?= $acte->fullname_pere() ?>" class="form-control form-control-user" id="fullname_pere"
                            placeholder="Nom complet du pere ">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" value="<?= $acte->fullname_mere() ?>" class="form-control form-control-user" id="fullname_mere"
                            placeholder="Nom complet de la mere ">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="number" min="1" value="<?= $acte->age_pere() ?>" class="form-control form-control-user" id="age_pere"
                            placeholder="Age  du pere ">
                    </div>
                    <div class="col-sm-6">
                        <input type="number" min="1" value="<?= $acte->age_pere() ?>" class="form-control form-control-user" id="age_mere"
                            placeholder="Age de la mere ">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" value="<?= $acte->domicile_pere() ?>" class="form-control form-control-user" id="domicile_pere"
                            placeholder="Domicile du pere ">
                    </div>
                    <div class="col-sm-6">
                        <input type="text"  value="<?= $acte->domicile_mere() ?>" class="form-control form-control-user" id="domicile_mere"
                            placeholder="Domicile de la mere ">
                    </div>
                </div>

                <input type="hidden" id="nom_declarant" value="<?= $user->username() ?>">
                <input type="hidden" id="acte_id" value="<?= $acte->id() ?>">
                <input type="hidden" id="user" value="<?= $id ?>">
                <a id="edit" class="btn btn-primary btn-user btn-block">
                    Modifier  cet acte de naissance 
                </a>
                <hr>
            </form>
    </div>
</div>
                            

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/editNaissance.js"></script>
<?php include "../layouts/real/footer.php" ; 