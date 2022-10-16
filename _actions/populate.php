<?php

    include("../vendor/autoload.php");
    use Faker\Factory as Faker;

    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;

    $faker = Faker::create();
    $table = new UsersTable(new MySQL());

    if($table){
        echo "Database Connection opened.\n";

        for($i = 0; $i < 10; $i++){
            $table->insert([
                "name" => $faker->name,
                "email" => $faker->email,
                "password" => "password",
                "phone" => $faker->phoneNumber,
                "address" => $faker->address,
                "role_id" => $i < 5 ? rand(1, 3) : 1
            ]);
        }

        echo "Done populating users table.\n";
    }