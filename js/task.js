$(document).ready(function() {
    let id = getUrlParameter("id");
    if (id !== undefined) {
        $.get("http://api/tasks/" + id, function(jsonData) {
            $('#title').attr("value", jsonData.title);
            $('#data').val(jsonData.data);
            $("#cancel").click(function() {
                $.ajax({
                    url: "http://api/tasks/" + id,
                    type: "DELETE"
                });
                window.location.replace("/");
            });
            $("#send").click(function(){
                validate($('#title').val().trim(), $('#data').val().trim(), function (title, data) {
                    $.ajax({
                        headers: {
                            "title": title,
                            "data": data
                        },
                        url: "http://api/tasks/" + id,
                        type: "PUT"
                    });
                });
                window.location.replace("/");
            });
        });
    } else {
        $(document).attr("title", "Новая задача");
        $("#cancel").html("Отмена").click(function () {
            window.location.replace("/");
        });
        $("#send").html("Создать").click(function() {
            validate($('#title').val().trim(), $('#data').val().trim(), function (title, data) {
                $.ajax({
                    headers: {
                        "title": title,
                        "data": data
                    },
                    url: "http://api/tasks/",
                    type: "POST"
                });
            });
            window.location.replace("/");
        });
    }
});

function getUrlParameter(sParam) {
    let sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

function validate(title, data, func) {
    if (title.length > 0 && data.length > 0) {
        if (title.length <= 20 && data.length <= 100) {
            func(title, data);
        } else {
            alert("Слишком длинное название или описание!");
        }
    } else {
        alert("Не заполнено название или описание!");
    }
}