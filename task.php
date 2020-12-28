<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="js/task.js"></script>
<!DOCTYPE html>
<html>
<head>
    <title>Задача</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center">
<div class="container w-50 p-3">
    <form>
        <div class="form-group">
            <label for="title">Название:</label>
            <input type="text" class="form-control" id="title">
        </div>
        <div class="form-group">
            <label for="data">Описание:</label>
            <textarea class="form-control" id="data"></textarea>
        </div>
    </form>
    <button type="button" class="btn btn-success" id="send">Сохранить изменения</button>
    <button type="button" class="btn btn-danger" id="cancel">Удалить</button>
</div>
</body>
</html>
