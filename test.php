<?php

    include("vendor/autoload.php");

    use Helpers\HTTP;
    use Helpers\Auth;
    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;


    $table = new UsersTable(new MySQL());

    print_r($table->getAll());
    echo "<br>";

    Auth::check();

    
    



