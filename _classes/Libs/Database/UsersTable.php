<?php

    namespace Libs\Database;

    use PDOException;

    class UsersTable
    {
        private $db;

        public function __construct(MySQL $mysql)
        {
            $this->db = $mysql->connect();
        }

        public function insert($data)
        {
            try {
                $query = "INSERT INTO users (name, email, phone, address, password, role_id, created_at, updated_at) 
                                VALUES (:name, :email, :phone, :address, :password, :role_id, now(), now()) ";
                $statement = $this->db->prepare($query);
                $statement->execute($data);
                return $this->db->lastInsertId();
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit();
            }
        }


        public function getAll()
        {
            try {
                $query = "SELECT users.*, roles.name AS rolename, roles.value FROM users LEFT JOIN roles ON users.role_id = roles.id ORDER BY id DESC";
                $statement = $this->db->query($query);
                return $statement->fetchAll();
                
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit();
            }
        }

        public function findByEmailAndPassword($email, $password)
        {
            try {
                $statement = $this->db->prepare("SELECT users.*, roles.name AS role, roles.value FROM users LEFT JOIN roles 
                                            ON users.role_id = roles.id WHERE users.email = :email");
                $statement->execute([
                    ':email' => $email,
                ]);


                $users = $statement->fetch();

                if($users){
                    if(password_verify($password, $users->password)){
                        return $users;
                    }
                }
                return false;
                
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit();
            }
            
        }

        public function updatePhoto($id, $name)
        {
            $statement = $this->db->prepare("UPDATE users SET photo = :name WHERE id = :id");
            $statement->execute([':name' => $name, ':id' => $id]);

            return $statement->rowCount();
        }

        public function suspend($id)
        {
            $statement = $this->db->prepare("UPDATE users SET suspended = 1 WHERE id = :id");
            $statement->execute([':id' => $id]);
            return  $statement->rowCount();
        }

        public function unsuspend($id)
        {
            $statement = $this->db->prepare("UPDATE users SET suspended = 0 WHERE id = :id");
            $statement->execute([':id' => $id]);
            return $statement->rowCount();
        }

        public function changeRole($id, $role)
        {
            $statement = $this->db->prepare("UPDATE users SET role_id = :role WHERE id = :id");
            $statement->execute([
                ':id' => $id, 
                ':role' => $role,
            ]);
            
            return $statement->rowCount();
        }

        public function delete($id)
        {
            $statement = $this->db->prepare("DELETE FROM users WHERE id = :id");
            $statement->execute([':id' => $id]);

            return $statement->rowCount();
        }
    }