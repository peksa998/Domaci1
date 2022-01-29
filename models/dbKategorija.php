<?php

    class Kategorija {
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

        // kategorija tabela
        public function insertKategorija($kategorija) {
            $sql = "INSERT INTO kategorija (kategorija) VALUE (:kategorija)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['kategorija'=>$kategorija]);

            return true;
        }

        public function readKategorija() {
            $data = array();
            $sql = "SELECT * FROM kategorija";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $data[] = $row;
            }
            return $data;
        }

        public function getKategorijaById($id) {
            $sql = "SELECT * FROM kategorija WHERE kategorijaID = $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['kategorijaID'=>$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function updateKategorija($id, $kategorija) {
            $sql = "UPDATE kategorija SET kategorija = :kategorija WHERE kategorijaID = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['kategorija'=>$kategorija, 'kategorijaID'=>$id]);
            return true;
        }

        public function deleteKategorija($id) {
            $sql = "DELETE FROM kategorija WHERE kategorijaID = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['kategorijaID'=>$id]);
            return true;
        }

        public function totalRowCountKategorija() {
            $sql = "SELECT * FROM kategorija";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $t_rows = $stmt->rowCount();

            return $t_rows;
        }
        // END kategorija tabela
    }
?>