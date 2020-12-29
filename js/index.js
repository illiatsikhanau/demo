$(document).ready(function() {
    createSortedTbody(null, );
    $("#add").click(function() {
        window.location.replace("task.php");
    });
});

function createSortedTbody(columnName, sortDir) {
    $('#tasks').append('<tbody>');
    $.get('http://api/tasks', function(data) {
        switch (columnName) {
            case "title":
                data.sort(function (a, b) {
                    return sortProperty(a.title.toLowerCase(), b.title.toLowerCase(), sortDir);
                });
                break;
            case "data":
                data.sort(function (a, b) {
                    return sortProperty(a.data.toLowerCase(), b.data.toLowerCase(), sortDir);
                });
                break;
            case "created":
                data.sort(function (a, b) {
                    return sortProperty(a.created, b.created, sortDir);
                });
                break;
        }
        for (let i = 0; i < data.length; i++) {
            $('#tasks').append('<tr data-href="task.php?id=' + data[i].id + '"><td>' + data[i].title + '</td><td>' + data[i].data + '</td><td>' + data[i].created + '</td></tr>');
        }
    });
    $('#tasks').append('</tbody>');

    $('tbody').on('click', 'tr', function() {
        document.location.href = $(this).data('href');
    });
}

function sortProperty(a, b, sortDir) {
    let dir = ((a < b) ? -1 : ((a > b) ? 1 : 0));
    return sortDir ? dir : -dir;
}

function sortTable(columnName) {
    let sortDir = $(`#${columnName}`).val() === "asc";
    if(sortDir) {
        $(`#${columnName}`).val("desc");
    } else {
        $(`#${columnName}`).val("asc");
    }

    $('tbody').remove();
    createSortedTbody(columnName, sortDir);
}