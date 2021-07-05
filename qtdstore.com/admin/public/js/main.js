$(document).ready(function() {

    $('ul.action li').not(':first-child').click(function() {
        if (!$(this).hasClass('active')) {
            $('ul.action li.active').removeClass('active');
            $(this).addClass('active');
            $('ul.action li .action-sub').slideUp(200);
            $(this).children('.action-sub').stop().slideToggle(200);
        } else {
            $(this).removeClass('active');
            $('ul.action li .action-sub').stop().slideUp(200);
        }
    });

    $('#select-all').change(function() {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });

    $('#edit').click(function() {
        $('form#infomation input.can').removeAttr('disabled');
        $('form#infomation select.can').removeAttr('disabled');
        $('form#infomation #confirm').removeAttr('disabled');
        $('form#infomation #confirm').addClass('bg');
        $('button.d-none').removeClass('d-none');
        return false;
    });

    $('#new').click(function() {
        $('form#infomation input').val('');
        $('form#infomation select').val('');
        $('form#infomation checkbox').attr('checked', '');
        return false;
    });
});