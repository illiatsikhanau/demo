$(document).ready(function(){
    $.get('http://api/tasks', function(data) {
        for (var i = 0; i < data.length; i++) {
            $('#tasks').append('<tr data-href="task.php?id=' + data[i].id + '"><td>' + data[i].title + '</td><td>' + data[i].data + '</td><td>' + data[i].created + '</td></tr>');
        }
    });

    $('table').on('click', 'tr', function(e) {
        document.location.href = $(this).data('href');
    });

    $("#add").click(function() {
        window.location.replace("task.php");
    });
});