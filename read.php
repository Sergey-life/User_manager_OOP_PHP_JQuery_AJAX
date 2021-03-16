<?php

    include "model.php";

    $read_id = $_POST['read_id'];

    $model = new Model();

    $row = $model->read($read_id);

    if (!empty($row)) { ?>

        <p>Name - <?php echo $row['name']; ?></p>
        <p>Surname - <?php echo $row['surname']; ?></p>
        <p>Position - <?php echo $row['position']; ?></p>

    <?php

    }

?>
