$(document).ready(function() {
    $('.tab-content:first-child').show();
    $('ul.tab-list li:first-child').addClass('active');
    $('ul.tab-list li').click(function(event) {
        index = $(this).index();
        $('ul.tab-list li').removeClass('active');
        $(this).addClass('active');

        $('.tab-content').hide(200);
        $('.tab-content').eq(index).show(200);
    });

    $('a.choose').click(function() {
        $('form#upload-avt').stop().slideToggle(200);
    });

    $('#file').change(function() {
        if ($('#file').val == '') {
            $('.upload-url').html('Chưa có ảnh');
        } else {
            $('.upload-url').html($('#file').val());
        }
    });

    var inputFile = $('#file');
    $('.btn-upload').click(function(event) {
        var URI_single = inputFile.attr('data-url');
        var fileToUpload = inputFile[0].files[0];
        var formData = new FormData();
        formData.append('file', fileToUpload);
        $.ajax({
            url: URI_single,
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                showThumbUpload(data);
                if (data.status == 'ok') {
                    $("#thumbnail_url").val(data.file_path);
                    $('form#upload-avt').hide();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
        return false;
    });

    function showThumbUpload(data) {
        var items;
        items = '<img src="' + data.file_path + '"/>';
        $("a.avatar-thumb").html(items);
    }

    $('#update-info').click(function() {
        var first_name = $('#first-name').val();
        var last_name = $('#last-name').val();
        var date_of_birth = $('#date-of-birth').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var gender = $('#gender').val();
        var region = $('#region').val();
        var data = { first_name: first_name, last_name: last_name, date_of_birth: date_of_birth, phone: phone, address: address, gender: gender, region: region };
        $.ajax({
            url: '?mod=users&action=update_user',
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function(data) {
                if (data.status == 'ok') {
                    $('td.fullname').html(data.first_name + " " + data.last_name);
                    $('td.date').html(data.date_of_birth);
                    $('td.phone').html(data.phone);
                    $('td.address').html(data.address);
                    if (data.gender == 'male') {
                        $('td.gender').html('Nam');
                    } else if (data.gender == 'female') {
                        $('td.gender').html('Nữ');
                    }
                    $('td.region').html(data.region);
                    $('h3.show_fullname').html(data.first_name + " " + data.last_name);
                    $('p.success').text(data.success);
                    $('.hide').hide();
                }
                if (data.status == 'error') {
                    $('.first-name').html(data.error.first_name);
                    $('.last-name').html(data.error.last_name);
                    $('.phone').html(data.error.phone);
                    $('p.success').hide();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
        return false;
    });

    $('span.ok-close').click(function() {
        $('.password-alert').hide();
    });

});