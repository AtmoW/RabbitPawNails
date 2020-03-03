$(document).ready(function () {

    var files;

    $('input[type=file]').on('change', function () {
        files = this.files;
    });

    $(".port__add").click(function () {

        if (typeof files == 'undefined') return;

        var data = new FormData();

        $.each(files, function (key, value) {
            data.append(key, value);
        });

        data.append('my_file_upload', 1);

        $.ajax({
            url: 'api/portfolio.php',
            type: 'POST', // важно!
            data: data,
            cache: false,
            dataType: 'json',
            // отключаем обработку передаваемых данных, пусть передаются как есть
            processData: false,
            // отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
            contentType: false,
            // функция успешного ответа сервера
            success: function (respond, status, jqXHR) {
                if (typeof respond.error === 'undefined') {

                    $('.portfolio').html('');

                    respond.forEach(function (item) {
                        $('.portfolio').append('<div class="portfolio-item">' +
                            '                        <div data-url="' + item['photo_url'] + '" data-id="' + item['id'] + '" name="delete" class="port__delete">Удалить фото</div>' +
                            '                    <img src="' + item['photo_url'] + '" alt=""></div>');
                    });


                }
                // ошибка
                else {
                    console.log('ОШИБКА: ' + respond.error);
                }
            },
            // функция ошибки ответа сервера
            error: function (jqXHR, status, errorThrown) {
                console.log('ОШИБКА AJAX запроса: ' + status, jqXHR);
            }

        });
    });

    $(".portfolio").on('click', '.portfolio-item .port__delete', function () {
        let id = '';
        let url = '';
        id = $(this).data('id');
        url = $(this).data('url');

        $.post("api/portfolio.php", {"function": "delete", "photo_url": url, "id": id}, function (data) {

            $('.portfolio').html('');
            data.forEach(function (item) {
                $('.portfolio').append('<form action="portfolio.php" method="post">' +
                    '            <div class="portfolio-item">' +
                    '                 <div data-url="' + item['photo_url'] + '" data-id="' + item['id'] + '" name="delete" class="port__delete">Удалить фото</div>' +
                    '                <img src="' + item['photo_url'] + '" alt="">' +
                    '            </div>\n' +
                    '        </form>');
            });
        }, 'json');

    });


    $("#time_date").change(function () {
        let time_date = $("#time_date").val();

        $.post("api/time.php", {"time_date": time_date, "function": 'take'},
            function (data) {
                console.log(data);

                $('#new_start').val(data['start']);
                $('#new_end').val(data['end']);
                if (data['id'] != 1) {
                    $('#new_id').val(data['id']);
                }
            }, 'json'
        );
    });

    $("#time_edit").click(function () {
        let time_date = $("#time_date").val();
        let time_start = $('#new_start').val();
        let time_end = $('#new_end').val();
        let time_id = $('#new_id').val();
        $('.weekend__block').html('');

        $.post("api/time.php", {
            "time_date": time_date,
            "function": 'edit',
            "start": time_start,
            "end": time_end,
            "id": time_id
        });

        setTimeout(function () {
            window.location.reload();
        }, 800);
    });

    $('.weekend_add').on('click', function () {
        date = $('.weekend_date').val();
        $.post("api/weekend.php", {"function": 'add', "date": date}, function (data) {
            $('.calendar_block').append('<div class="weekend box" data-id="' + data["id"] + '">' +
                '<form action="calendar.php" method="post">\n' +
                '        <div class="form__block">' +
                '            <label for="">' + data["full_date"] + '</label>' +
                '            <div data-id="' + data["id"] + '" class="weekend_delete btn">Удалить выходной</div>' +
                '        </div>' +
                '    </form>' +
                '</div>');
        }, 'json');
    });

    $('.calendar_block').on('click','.weekend_delete', function () {
        id = $(this).attr('data-id');
        $.post("api/weekend.php", {'function': 'delete', "id": id}, function (data) {
            $('.weekend[data-id=' + id + ']').remove();
        });

    });

    $('.delete_app').on('click', function () {
        id = $(this).attr('data-id');
        alert(id);
        $.post("api/applications.php", {'function': 'delete', "id": id}, function (data) {
            $('.app[data-id=' + id + ']').remove();
        });
    });

    $('.add_client').on('click', function () {
        id = $(this).attr('data-id');
        $.post("api/applications.php", {'function': 'add', "id": id}, function (data) {
            $('.app[data-id=' + id + ']').remove();
        });
    });

    $('.break_delete').on('click', function () {
        id = $(this).attr('data-id');
        $.post("api/breaks.php", {'function': 'delete', "id": id}, function (data) {
            $('.break[data-id=' + id + ']').remove();
        });
    });

    $('.break_add').on('click', function () {
        start = $('.break_start').val();
        date = $('.break_date').val();
        end = $('.break_end').val();

        $.post("api/breaks.php", {'function': 'add', "date": date, 'start': start, "end": end}, function (data) {
            $('.breaks').append('<div class="break box" data-id="' + data['id'] + '">' +
                '            <form action="breaks.php" method="post">' +
                '                <div class="form__block">' +
                '                    <form action="breaks.php">' +
                '                        <div class="form__block">' +
                '                            <div class="title">' + data['date_all'] + '</div>' +
                '                            <input type="hidden" name="date" value="' + data['date'] + '">' +
                '                            <label for="start">Время начала перерыва</label>\n' +
                '                            <input id="start" name="start" value="' + data['start'] + '" type="text" required>' +
                '                            <input type="hidden" name="id" value="' + data['id'] + '">' +
                '                            <label for="end">Время конца перерыва</label>' +
                '                            <input id="end" name="end" value="' + data['end'] + '" type="text" required>' +
                '                            <input type="submit" name="edit" class="btn" value="Изменить">' +
                '                        </div>' +
                '                    </form>' +
                '                    <div data-id="' + data['id'] + '" class="break_delete btn">Удалить</div>' +
                '                </div>' +
                '            </form>' +
                '        </div>');
        }, 'json');
    });


    $('.sales_add').on('click',function () {
        count = $('.sales_count').val();
        percent = $('.sales_percent').val();

        $.post("api/sales.php", {'function': 'add', "count":count, "percent":percent}, function (data) {
            $('.sales_block').append('<div class="box">\n' +
                '<div class="title">От '+data['count']+' посещений - '+data['percent']+'%</div>\n' +
                '                           <div class="sales_delete btn">Удалить</div>\n' +
                '                   </div>');
        }, 'json');
    });

    $('.sales_add_students').on('click',function(){
        percent = $('.stud_perc').val();
        $.post("api/sales.php", {'function': 'upd_stud', 'percent':percent}, function (data) {
            setTimeout(function () {
                window.location.reload();
            }, 100);
        });
    });

});