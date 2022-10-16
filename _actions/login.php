<?php 

    session_start();

    include('../vendor/autoload.php');

    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;
    use Helpers\HTTP;

    $email = $_POST['email'];
    // $password = md5($_POST['password']);
    $password = $_POST['password'];

    $table = new UsersTable(new MySQL);
    $user = $table->findByEmailAndPassword($email, $password);

    if($user){

        if($user->suspended == 1){
            $_SESSION['fail'] = "Your account has been suspended";
            HTTP::redirect("/index.php");
        }

        $_SESSION['user'] = $user;
        $_SESSION['success'] = "Login Successfully";
        HTTP::redirect("/dashboard.php");      

        
    }else{
        $_SESSION['fail'] = "Incorrect email (or) password";
        HTTP::redirect("/index.php");
    }