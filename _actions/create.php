<?php 
    session_start();

    include("../vendor/autoload.php");

    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;
    use Helpers\HTTP;

    $data = [
        "name" => $_POST['name'] ?? 'Unknown',
        "email" => $_POST['email'] ?? 'Unknown',
        // "password" => md5($_POST['password']) ?? 'Unknown',
        "password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
        "phone" => $_POST['phone'] ?? 'Unknown',
        "address" => $_POST['address'] ?? 'Unknown',
        "role_id" => 1,

    ];

    $table = new UsersTable(new MySQL);

    if($table){
        $table->insert($data);
        $_SESSION['success'] = "Register Successfully";
        HTTP::redirect("/index.php");
    }else{
        $_SESSION['fail'] = "Register cann't Created";
        HTTP::redirect("/register.php");  
    }