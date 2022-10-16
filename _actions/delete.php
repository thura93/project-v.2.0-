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
    $photo = $_GET['photo'];
    $photo_path = "photos/".$photo;
    $user = $table->delete($id);
    unlink($photo_path);

    if($user){
        $_SESSION['success'] = "User has been deleted successfully";
        HTTP::redirect("/users.php");
    }
    else{
        $_SESSION['incorrect'] = "User has not been deleted.";
        HTTP::redirect("/users.php");
    }

