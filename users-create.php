<?php 
    $page = "Users Create";
    include("layouts/header.php");

    include("layouts/navbar.php");

    include("vendor/autoload.php");

    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;
    use Helpers\Auth;

    $table  = new UsersTable(new MySQL);
    $users = $table->getAll();

    Auth::check();


?>
    <div class="container mt-5" style="height: 550px;">
        <div class="row justify-content-center">
            <div class="col-sm-4 bg-dark text-info p-3 rounded">
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <h3 class="text-center"><strong>Create New User</strong></h3>
                    </div>
                </div>                
                <div class="mt-3 mb-3">              
                    <form action="_actions/store.php" method="POST">
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-dark text-info" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <input type="name" name="name" class="form-control" placeholder="Username" aria-label="name" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-dark text-info" id="basic-addon1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bg-dark text-info" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-dark text-info" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
                            <input type="text" name="phone" class="form-control" placeholder="phone" aria-label="phone" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-dark text-info" id="basic-addon1"><i class="fa fa-map" aria-hidden="true"></i></span>
                            <textarea name="address" cols="30" rows="2" class="form-control" placeholder="Contact Address"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 float-end mb-4"><i class="fa fa-save"></i> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 
<?php
    include("layouts/footer-bar.php");
    include("layouts/footer.php"); 
?>
    
