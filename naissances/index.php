<?php 
include "../layouts/real/header.php"  ; 
include "../vendor/autoload.php"; 

use App\Controllers\Naissances; 
if($user->role() == "admin")
{ 
 $naissances = Naissances::all() ; 

}else { 
    if($user->role() !== "supervisor")
    {
        echo '<script>window.location.href="/dashboard"</script>' ; 
    }

    $naissances = Naissances::allByArrondissement($user->arrondissement()) ; 

}

if(filter_has_var(INPUT_POST, "delete")) { 
    $naissance_id = $_POST['id'] ; 

    echo var_dump(Naissances::delete($naissance_id)) ; 

    //echo "<script>window.location.href='/naissances'</script>" ; 
}
?>

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Actes de naissances </h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Actes de naissances Visualisation</h6>
        <div class="d-flex">
            <a href="/add-naissances" class="btn btn-primary"> Ajouter un nouvel acte de naissance</a>
        </div>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom Enfant </th>
                        <th>Arrondissement</th>
                        <th>Delivré le </th>
                        <th>Actions </th>
                    </tr>
                </thead>
                    
                <tbody>
                    <?php if(count($naissances) !== 0) : ?>
                        <?php foreach($naissances as $naissance) : ?>
                            <tr>
                            <td><?= $naissance->id() ?></td>
                                <td><?= $naissance->prenom() ?></td>
                                <td> <?= $naissance->arrondissement() ?></td>
                                <td><?= $naissance->createdAt() ?></td>
                                
                                <td class="row">
                                    <div class="d-inline-flex">
                                        <div class="col-md-6">
                                            <a class="btn btn-primary" href='/naissance/?id=<?= $naissance->id() ?>'>Consulter  </a>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="" method="post">
                                                <input type="hidden" name="id" value="<?= $naissance->id() ?>">
                                                <button class="btn btn-danger" name="delete" href="/naissance/">Supprimer </button>
                                            </form>
                                           
                                        </div>
                                    </div>
                                </td>
                            </tr>
                    <?php endforeach ?>
                    <?php else : ?> 


                    <?php endif ?>
                    
                  
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>



<?php include "../layouts/real/footer.php"?>