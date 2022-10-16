<?php
    session_start();

    include("../vendor/autoload.php");

    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;
    use Helpers\HTTP;
    use Helpers\Auth;

    $auth = Auth::check();

    $table = new UsersTable(new MySQL);
    
    $name = $_FILES['photo']['name'];
    $error = $_FILES['photo']['error'];
    $tmp = $_FILES['photo']['tmp_name'];
    $type = $_FILES['photo']['type'];

    if($error){
        $_SESSION['error'] = "Cannot upload file";
        HTTP::redirect("/profile.php");
    }

    if($type == "image/jpeg" or $type == "image/png"){ 
        if($name != ''){
            $old_photo = "photos/". $name;
            
            unlink($old_photo);
        }
        $table->updatePhoto($auth->id, $name);
        move_uploaded_file($tmp, "photos/$name");
        $auth->photo = $name;
        $_SESSION['success'] = "Profile Image Upload Successfully";
        HTTP::redirect("/profile.php");
    }else{
        $_SESSION['error'] = "No file upload, allow the image file.";
        HTTP::redirect("/profile.php");
    }