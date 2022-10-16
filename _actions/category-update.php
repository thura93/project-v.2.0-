<?php 
    session_start();

    include("../vendor/autoload.php");

    use Libs\Database\MySQL;
    use Libs\Database\CategoryTable;
    use Helpers\HTTP;

    if(isset($_POST['id'])){
        $table = new CategoryTable(new MySQL);    
        $id = $_POST['id'];
        $name = $_POST['name'];
        $table->update($id, $name);
        $_SESSION['success'] = "Category updated Successfully";
        HTTP::redirect("/categories.php");
    }else{
        $_SESSION['fail'] = "Category cann't Created";
        HTTP::redirect("/categories.php");  
    }