<?php 
include "../layouts/real/header.php" ?>

   
    <div class="row justify-content-center">               
        <div class="col-lg-8">
            <div class="p-5">
                <div class="text-center">
                </div>
                <form class="user">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                            id="email" aria-describedby="emailHelp"
                            placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                            id="pass" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control form-control-user"
                            id="confirm" placeholder="Confirm Password">
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleFormControlSelect1 text-sm " >Arrondissement</label>
                        <select class="form-control form-control-user" id="arrondissement">
                         <?php for ($i=1; $i <14; $i++) : ?>
                            <option value="<?= $i ?>"><?= $i ?>e Arrondissement</option>
                         <?php endfor ?>
                       
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="exampleFormControlSelect1 text-sm " >Role</label>
                        <select class="form-control form-control-user" id="role">
                        <option value="admin" selected>Administrateur</option>
                        <option value="supervisor">Superviseur</option>
                        <option value="analytics"> Analytics </option>
                        </select>
                    </div>

                    <a id="create" class="btn btn-primary btn-user btn-block">
                        Creer un utilisateur 
                    </a>
                    <hr>
                    
                </form>
                <hr>
                
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/createUser.js"></script>
<?php include "../layouts/real/footer.php"?>