<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>User manager</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">User manager</h1>
            <hr style="height: 1px; color: black; background-color: black;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <form action="" method="post" id="form">
                <div id="result"></div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Surname</label>
                    <input type="text" id="surname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Position</label>
                    <select name="position" id="position"> <!--Supplement an id here instead of using 'name'-->
                        <option value="программист" selected>программист</option>
                        <option value="менеджер">менеджер</option>
                        <option value="тестировщик">тестировщик</option>
                    </select>
<!--                    <textarea name="position" id="position" cols="" rows="3" class="form-control"></textarea>-->
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" id="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-1">
            <div id="show"></div>
            <div id="fetch"></div>
        </div>
    </div>
</div>

<!--Модальное окно для просмотра записей-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Single data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="read_data"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<!--                <button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>

<!--Модальное окно для редактирования записей-->

<!-- Modal -->
<div class="modal fade" id="exampleModal_1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="edit_data"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="update">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
-->
<script>
    $(document).on("click", "#submit", function (e) {
        e.preventDefault();

        var name = $("#name").val();
        var surname = $("#surname").val();
        var position = $("#position").val();
        var submit = $("#submit").val();
        console.log(position);
        $.ajax({
            url: "insert.php",
            type: "post",
            data: {
                name:name,
                surname:surname,
                position:position,
                submit:submit
            },
            success: function (data) {
                fetch();
                $("#result").html(data);
            }
        });

        $("#form")[0].reset();
    });

    // Fetch records
    function fetch() {

        $.ajax({
            url: "fetch.php",
            type: "post",
            success: function (data) {
                $("#fetch").html(data);
            }

        });
    }
    fetch();

    //Delete record
    $(document).on("click", "#del", function (e) {
        e.preventDefault();
        
        if (window.confirm("Do you want delete record?")) {

            var del_id = $(this).attr("value");

            $.ajax({
                url: "del.php",
                type: "post",
                data: {
                    del_id:del_id
                },
                success: function (data) {
                    fetch();
                    $("#show").html(data);
                }
            });
        } else {
            return false;
        }

    });

    //Read record

    $(document).on("click", "#read", function (e) {
       e.preventDefault();

       var read_id = $(this).attr("value");

       $.ajax({
          url: "read.php",
          type: "post",
          data: {
              read_id:read_id
           },
           success: function (data) {
               $("#read_data").html(data);
               console.log(data)
           }
       });
    });

    //Edit record

    $(document).on("click", "#edit", function (e) {
       e.preventDefault();

       var edit_id = $(this).attr("value");

       $.ajax({
           url: "edit.php",
           type: "post",
           data: {
               edit_id:edit_id
           },
           success: function (data) {
               $("#edit_data").html(data);
           }
       });
    });

    //Update record

    $(document).on("click", "#update", function (e) {
       e.preventDefault();

       var edit_name = $("#edit_name").val();
       var edit_surname = $("#edit_surname").val();
       var edit_position = $("#edit_position").val();
       var update = $("#update").val();
       var edit_id = $("#edit_id").val();

       $.ajax({
           url: "update.php",
           type: "post",
           data: {
               edit_id:edit_id,
               edit_name:edit_name,
               edit_surname:edit_surname,
               edit_position:edit_position,
               update:update
           },
           success: function (data) {
               fetch();
               $("#show").html(data);
           }
       });
    });
</script>
</body>
</html>