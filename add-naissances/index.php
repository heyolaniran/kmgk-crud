<?php include "../layouts/real/header.php" ?> 


<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="p-5">

            <form class="user">
            <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="prenom"
                        placeholder="Nom de l'enfant ">
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleFormControlSelect1 text-sm " >Sexe</label>
                        <select class="form-control form-control-user" id="sexe">
                        <option value="masculin" selected>Masculin</option>
                        <option value="feminin">Feminin</option>
                        
                        </select>
                    </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="fullname_pere"
                            placeholder="Nom complet du pere ">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" id="fullname_mere"
                            placeholder="Nom complet de la mere ">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="number" min="1" class="form-control form-control-user" id="age_pere"
                            placeholder="Age  du pere ">
                    </div>
                    <div class="col-sm-6">
                        <input type="number" min="1" class="form-control form-control-user" id="age_mere"
                            placeholder="Age de la mere ">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="domicile_pere"
                            placeholder="Domicile du pere ">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" id="domicile_mere"
                            placeholder="Domicile de la mere ">
                    </div>
                </div>

                <input type="hidden" id="nom_declarant" value="<?= $user->username() ?>">
                <input type="hidden" id="arrondissement_id" value="<?= $user->arrondissement() ?>">
                <input type="hidden" id="user" value="<?= $id ?>">
                <a id="create" class="btn btn-primary btn-user btn-block">
                    Enregistrer cet acte de naissance 
                </a>
                <hr>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/createNaissance.js"></script>

<?php include "../layouts/real/footer.php" ?> 