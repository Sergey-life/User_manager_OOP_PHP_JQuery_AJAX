<?php

    include 'model.php';

    $model = new Model();

    $rows = $model->fetch();

//    var_dump($rows)

?>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Position</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php

            $i = 1;

            if (!empty($rows)) {
                foreach ($rows as $row) { ?>

                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['surname']; ?></td>
                    <td><?php echo $row['position']; ?></td>
                    <td>
                        <a href="#" id="read" class="btn btn-info" value="<?php echo $row['id']; ?>">Read</a>
                        <a href="#" id="edit" class="btn btn-warning" value="<?php echo $row['id']; ?>">Edit</a>
                        <a href="#" id="del" class="btn btn-danger" value="<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>

            <?php
                }
            } else {
                echo "
                    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                      No data
                      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>
                ";
            }

        ?>
    </tbody>
</table>