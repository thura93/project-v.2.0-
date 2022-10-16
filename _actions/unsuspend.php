<?php

    session_start();

    include("../vendor/autoload.php");

    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;
    use Helpers\HTTP;
    use Helpers\Auth;

    $auth = Auth::check();

    $table = new UsersTable(new MySQL);

    $id = $_GET['id'];
    $user = $table->unsuspend($id);

    if($user){
        $_SESSION['success'] = "Unsuspended has been changed successfully";
        HTTP::redirect("/users.php");
    }
    else{
        $_SESSION['incorrect'] = "Unsuspended has not been change.";
        HTTP::redirect("/users.php");
    }

