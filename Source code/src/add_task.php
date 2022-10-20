<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/edit.css">
    <title>To do list - add item</title>
</head>
<body>
    <h1>To do list</h1>
    <h2>Add new item</h2>

    <form action="../scripts/insert.php" method="post">

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Title:</span>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="inputGroup-sizing-default" placeholder="Your title">
        </div>
        <div class="input-group">
            <span class="input-group-text">Input description:</span>
            <textarea class="form-control" aria-label="Input description:" name="description" id="description" style="resize: none;" placeholder="Your description" rows="5"></textarea>
        </div>

        <div class="buttons" style="margin-top: 10px">
            <button type="button" class="btn btn-secondary"><a href="index.php">Go back</a></button>
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
