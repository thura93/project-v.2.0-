<?php

    namespace Libs\Database;

    use PDOException;

    class CategoryTable
    {
        private $db;

        public function __construct(MySQL $mysql)
        {
            $this->db = $mysql->connect();
        }

        public function insert($data)
        {
            try {
                $query = "INSERT INTO categories (name, created_at, updated_at) 
                                VALUES (:name, now(), now()) ";
                $statement = $this->db->prepare($query);
                $statement->execute($data);
                return $this->db->lastInsertId();
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit();
            }
        }

        public function search($search)
        {
            try {
                $query = "SELECT * FROM categories WHERE name LIKE '%$search%'  ORDER BY id DESC";
                $statement = $this->db->query($query);
                return $statement->fetchAll();
                
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit();
            }
        }


        public function getAll()
        {
            try {
                $query = "SELECT * FROM categories ORDER BY id DESC";
                $statement = $this->db->query($query);
                return $statement->fetchAll();
                
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit();
            }
        }

        public function edit($id)
        {
            try {
                $query = "SELECT * FROM categories WHERE id = $id";
                $statement = $this->db->prepare($query);
                $statement->execute([':id' => $id]);
                return $statement->fetch();
                
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit();
            }
        }

        public function update($id, $name)
        {
            $statement = $this->db->prepare("UPDATE categories SET name = :name, updated_at = now() WHERE id = :id");
            $statement->execute(['name' => $name, ':id' => $id]);

            return $statement->rowCount();
        }

        public function delete($id)
        {
            $statement = $this->db->prepare("DELETE FROM users WHERE id = :id");
            $statement->execute([':id' => $id]);

            return $statement->rowCount();
        }
    }