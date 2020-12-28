<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<!DOCTYPE html>
<html>
<head>
    <title>Список задач</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center">
<div class="container w-75 p-3">
    <table id="tasks" class="table table-striped table-hover">
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Время создания</th>
        </tr>
    </table>
    <button type="button" class="btn btn-success" id="add">Добавить задачу</button>
</div>
</body>
</html>

