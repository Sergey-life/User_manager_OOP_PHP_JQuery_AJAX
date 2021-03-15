<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Users form</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Users form</h1>
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
</div>

<!-- Optional JavaScript; choose one of the two! -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

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
                $("#result").html(data);
            }
        });

        $("#form")[0].reset();
    });
</script>
</body>
</html>