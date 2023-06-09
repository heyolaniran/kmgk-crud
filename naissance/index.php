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
    <div class="card shadow mb-4">
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
                    <a href="edit.php?id=<?=$id?>" class="btn btn-primary ml-2">Editer</a>
                    <form action="" method="post">
                        <button name="print" class="btn btn-secondary ml-2"> <i class="fa fa-download" aria-hidden="true"></i> Telecharger </button>
                    </form>
                </div>
        </div>
    </div>
</div>
                            


<?php include "../layouts/real/footer.php" ; 