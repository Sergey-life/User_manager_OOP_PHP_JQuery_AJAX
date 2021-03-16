<?php

include 'model.php';

    if (isset($_POST['update'])) {
        if (isset($_POST['edit_name']) && isset($_POST['edit_surname']) && isset($_POST['edit_position']) && isset($_POST['edit_id'])) {

            if (!empty($_POST['edit_name']) && !empty($_POST['edit_surname']) && !empty($_POST['edit_position']) && !empty($_POST['edit_id'])) {

                $data['edit_id'] = $_POST['edit_id'];
                $data['edit_name'] = $_POST['edit_name'];
                $data['edit_surname'] = $_POST['edit_surname'];
                $data['edit_position'] = $_POST['edit_position'];

                $model = new Model();

                $update = $model->update($data);

            } else {
                echo "
                    <script>alert('Empty fields!');</script>
                ";
            }
        }
    }

?>
