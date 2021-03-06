<?php

    class Database {
        private $dsn = "mysql:host=localhost;dbname=domaci1";
        private $user = "root";
        private $pass = "";
        public $conn;

        public function __construct() {
            try {
                $this->conn = new PDO($this->dsn,$this->user,$this->pass);
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        // imenik tabela
        public function insert($ime, $prezime, $kategorijaID, $email, $telefon) {
            $sql = "INSERT INTO imenik (ime, prezime, kategorijaID, email, telefon) VALUE (:ime, :prezime, :kategorijaID, :email, :telefon)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['ime'=>$ime,'prezime'=>$prezime,'kategorijaID'=>$kategorijaID,'email'=>$email,'telefon'=>$telefon]);

            return true;
        }

        public function read() {
            $data = array();
            $sql = "SELECT * FROM imenik";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $data[] = $row;
            }
            return $data;
        }

        public function getKontaktById($id) {
            $sql = "SELECT * FROM imenik WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function update($id, $ime, $prezime, $kategorijaID, $email, $telefon) {
            $sql = "UPDATE imenik SET ime = :ime, prezime = :prezime, kategorijaID = :kategorijaID, email = :email, telefon = :telefon WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['ime'=>$ime, 'prezime'=>$prezime, 'kategorijaID'=>$kategorijaID, 'email'=>$email, 'telefon'=>$itelefonme, 'id'=>$id]);
            return true;
        }

        public function delete($id) {
            $sql = "DELETE FROM imenik WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            return true;
        }

        public function totalRoWCount() {
            $sql = "SELECT * FROM imenik";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $t_rows = $stmt->rowCount();

            return $t_rows;
        }
        // END imenik tabela
    }
?>