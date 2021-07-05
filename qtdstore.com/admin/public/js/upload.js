$(function() {
    var inputFile = $("#upload-thumb");
    $("#btn-upload-thumb").click(function(event) {
        var URI_single = $("#uploadFile #upload-thumb").attr("data-uri");
        var fileToUpload = inputFile[0].files[0];
        var formData = new FormData();
        formData.append("file", fileToUpload);
        console.log(URI_single);
        $.ajax({
            url: URI_single,
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) {
                console.log(data);
                if (data.status == "ok") {
                    showThumbUpload(data);
                    var url = $("#thumbnail_url").val(data.file_path);
                    // console.log(url);
                }
                if (data.status == "error") {
                    console.log(data.error);
                    $(".show_error").html(data.error.file);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            },
        });
        return false;
    });

    function showThumbUpload(data) {
        var items;
        items = '<img src="' + data.file_path + '"/>';
        $("#show_list_file").html(items);
    }

    // multi upload
    $("#bt_upload").click(function() {
        // var data = new FormData(this);
        var inputFile = $('#files');
        var fileToUpload = inputFile[0].files;
        if (fileToUpload.length > 0) {
            // alert(fileToUpload.length);
            var formData = new FormData();
            for (var i = 0; i < fileToUpload.length; i++) {
                var file = fileToUpload[i];
                formData.append('file[]', file, file.name);
            }
            $.ajax({
                url: '?mod=product&action=upload_multi_img',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'text',
                success: function(data) {
                    $("#result").html(data);
                    // console.log(data);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        //alert('ok');
        return false;
    });

    $("input[name='select_size[]").change(function() {
        idx = $(this).attr('idx');
        if (this.checked) {
            $("input[type='number'].can-2").eq(idx - 1).removeAttr('disabled');
        } else {
            $("input[type='number'].can-2").eq(idx - 1).attr('disabled', 'disabled');
            $("input[type='number'].can-2").eq(idx - 1).val('');
        }
    });

    $("input[name='select_all").change(function() {
        if (this.checked) {
            $("input[type='number'].can-2").removeAttr('disabled');
        } else {
            $("input[type='number'].can-2").attr('disabled', 'disabled');
            $("input[type='number'].can-2").val('');
        }
    });

});