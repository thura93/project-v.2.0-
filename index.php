<?php 
    $page = "Login";
    include("layouts/header.php");
?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-4 bg-dark text-center text-info p-5 rounded">
                <h3 class="mb-3"><strong>Login</strong></h3>
                
                <?php if(isset($_SESSION['fail'])) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Fail!</strong> <?php echo $_SESSION['fail']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; unset($_SESSION['fail']); ?>  

                <form action="_actions/login.php" method="POST">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-dark text-info" id="basic-addon1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text bg-dark text-info" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 float-end mb-4"><i class="fa fa-sign-in"></i> Login</button>
                </form>
                <a href="register.php">Register</a>
            </div>
        </div>
    </div> 
<?php include("layouts/footer.php"); ?>
    
