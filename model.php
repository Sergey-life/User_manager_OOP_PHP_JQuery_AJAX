<?php

    Class Model {

        private $server = "localhost";
        private $username = "root";
        private $password = "root";
        private $db = "TELENORMA_tz";
        private $conn;

        public function __construct()
        {
            try {
                $this->conn = new PDO("mysql:host=$this->server;dbname=$this->db", $this->username, $this->password);
            } catch (PDOException $e) {
                echo "connection failed" . $e->getMessage();
            }
        }

        public function insert()
        {
            if (isset($_POST['submit'])) {
                if (isset($_POST['name']) & isset($_POST['surname']) && isset($_POST['surname'])) {

                    if (!empty($_POST['name']) & !empty($_POST['surname']) && isset($_POST['surname'])) {

                       $name = $_POST['name'];
                       $surname = $_POST['surname'];
                       $position = $_POST['position'];

                        $query = "INSERT INTO records (name, surname, position) VALUES ('$name', '$surname', '$position')";

                        if ($sql = $this->conn->exec($query)) {
                            echo "
                                <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                              Record added successfully
                              <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                            </div>
                            ";
                        } else {
                            echo "
                                <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                              Failed to add record
                              <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                            </div>
                            ";
                        }
                    } else {
                        echo "
                            <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                              Empty field
                              <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                            </div>
                        ";
                    }
                }
            }
        }
    }

?>