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
    $role = $_GET['role'];
    $user = $table->changeRole($id, $role);

    if($user){
        $_SESSION['success'] = "Role has been changed successfully";
        HTTP::redirect("/users.php");
    }
    else{
        $_SESSION['incorrect'] = "Role has not been change.";
        HTTP::redirect("/users.php");
    }

