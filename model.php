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

        public function fetch()
        {
            $data = null;

            $stmt = $this->conn->prepare("SELECT * FROM records");

            $stmt->execute();

            $data = $stmt->fetchAll();

            return $data;
        }

        public function del($del_id)
        {
            $query = "DELETE FROM records WHERE id = '$del_id'";

            if ($sql = $this->conn->exec($query)) {
                echo "
                    <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                      Record delete successfully
                      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>
                ";
            } else {
                echo "
                    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                      Not delete
                      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>
                ";
            }
        }

        public function read($read_id)
        {
            $data = null;

            $stmt = $this->conn->prepare("SELECT * FROM records WHERE id='$read_id'");

            $stmt->execute();

            $data = $stmt->fetch();

            return $data;
        }

        public function edit($edit_id)
        {
            $data = null;

            $stmt = $this->conn->prepare("SELECT * FROM records WHERE id='$edit_id'");

            $stmt->execute();

            $data = $stmt->fetch();

            return $data;
        }

        public function update($data)
        {
            $query = "UPDATE records SET name='$data[edit_name]', surname='$data[edit_surname]', position='$data[edit_position]' WHERE id='$data[edit_id]'";

            if ($sql = $this->conn->exec($query)) {

                echo "
                    <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                  Record update successfully!
                  <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                </div>
                
                <script>
                    $('#exampleModal_1').modal('hide');
                </script>
                ";
            } else {
                echo "
                    <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                  Failed to update record!
                  <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                </div>
                ";
            }
        }
    }

?>