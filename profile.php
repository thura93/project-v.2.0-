<?php 
    $page = "Profile";
    include("layouts/header.php");
    include("layouts/navbar.php");

    include("vendor/autoload.php");
    
    use Helpers\Auth;

    $auth = Auth::check();

?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-8 bg-dark text-info p-5 rounded">
                <div class="row  mb-5">
                    <div class="col-sm-12">
                        <h3><strong>Profile</strong></h3>
                    </div>
                    <!-- <div class="col-sm-4">
                        <a href="_actions/logout.php"  class="btn btn-danger float-end btn-sm"><i class="fa fa-power-off"></i> Logout</a>
                    </div> -->
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <?php if($auth->photo) : ?>
                            <img id="img" src="_actions/photos/<?= $auth->photo ?>" class="profile_img" alt="Profile Image">
                        <?php else : ?>
                            <img id="img" src="img/150-1503945_transparent-user-png-default-user-image-png-png.png" class="profile_img" alt="Profile Image">
                        <?php endif; ?>
                        <h1 class="h4 text-center mt-2"><strong><?= $auth->name ?></strong></h1> 
                    </div>
                    <div class="col-sm-9">
                        <ul class="list-group">
                            <li class="list-group-item"><b>Email :</b> <?= $auth->email; ?></li> 
                            <li class="list-group-item">
                                <b>Role :</b> <?php if($auth->role_id == 1) : ?>
                                                <span class="badge bg-secondary"><?= $auth->role; ?></span>
                                            <?php elseif($auth->role_id == 2) : ?>
                                                <span class="badge bg-info"><?= $auth->role; ?></span>
                                            <?php elseif($auth->role_id == 3) : ?>
                                                <span class="badge bg-primary"><?= $auth->role; ?></span>
                                            <?php elseif($auth->role_id == 4) : ?>
                                                <span class="badge bg-success"><?= $auth->role; ?></span>
                                            <?php else : ?>
                                                <span class="badge bg-success"><?= $auth->role; ?></span>
                                            <?php endif; ?>      
                            </li>
                            <li class="list-group-item"><b>Phone :</b> <?= $auth->phone; ?></li> 
                            <li class="list-group-item"><b>Address :</b> <?= $auth->address; ?></li> 
                        </ul> 
                    </div>
                </div>    
                <div class="row">
                    <div class="col-sm-12">
                        <form action="_actions/upload.php" method="post" enctype="multipart/form-data">
                            <div class="input-group mb-3">
                                <input type="file" name="photo" onchange="preview(event)" class="form-control" id="inputGroupFile02" required>
                                <button class="input-group-text btn btn-info" type="submit" for="inputGroupFile02">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
<?php
    include("layouts/footer-bar.php");
    include("layouts/footer.php"); 
?>
