<?php 
    session_start();

    include("../vendor/autoload.php");

    use Libs\Database\MySQL;
    use Libs\Database\CategoryTable;
    use Helpers\HTTP;

    $data = [
        "name" => $_POST['name'] ?? 'Unknown',
    ];

    $table = new CategoryTable(new MySQL);

    if($table){
        $table->insert($data);
        $_SESSION['success'] = "Category Created Successfully";
        HTTP::redirect("/categories.php");
    }else{
        $_SESSION['fail'] = "Category cann't Created";
        HTTP::redirect("/categories.php");  
    }