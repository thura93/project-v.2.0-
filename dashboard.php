<?php 
    $page = "Dashboard";
    include("layouts/header.php");
    include("layouts/navbar.php");

    include("vendor/autoload.php");
    
    use Helpers\Auth;

    $auth = Auth::check();

?>
    <div class="container mt-3" style="height: 580px;">
        <div class="row justify-content-center">
            <div class="col-sm-12 bg-dark text-info p-5 rounded">
                
                <div class="row  mb-5">
                    <div class="col-sm-12">
                        <h3><strong>Dashboard</strong></h3>
                    </div>
                </div>
                
            </div>
        </div>
    </div> 
<?php
    include("layouts/footer-bar.php");
    include("layouts/footer.php"); 
?>
    
