<?php

    include 'model.php';

    $edit_Id = $_POST['edit_id'];

    $model = new Model();

    $row = $model->edit($edit_Id);

    if (!empty($row)) { ?>

        <form action="" method="post" id="form">
            <div id="result"></div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" id="edit_name" class="form-control" value="<?php echo $row['name']; ?>">
            </div>
            <div class="form-group">
                <label for="">Surname</label>
                <input type="text" id="edit_surname" class="form-control" value="<?php echo $row['surname']; ?>">
            </div>
            <div class="form-group">
                <label for="">Position</label>
                <select name="position" id="edit_position"> 
                    <option value="программист" selected><?php echo $row['position']; ?></option>
                    <option value="менеджер">менеджер</option>
                    <option value="тестировщик">тестировщик</option>
                </select>
            </div>
        </form>

    <?php

    }
?>