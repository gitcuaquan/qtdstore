$(document).ready(function() {
    $('.step:first-child').show();
    $('ul.breadcrumb-add li:first-child').addClass('active');
    $('ul.breadcrumb-add li').click(function(event) {
        index = $(this).index();
        $('ul.breadcrumb-add li').removeClass('active');
        $(this).addClass('active');

        $('.step').hide(200);
        $('.step').eq(index).show(200);
    });


    $('.step a.btn-next').click(function() {
        var stt = parseInt($(this).parent('.step').attr('idx'));
        stt = stt + 1;
        // alert(stt);
        $(this).parent('.step').hide(200);
        $(this).parent('.step').next().show(200);
        $('ul.breadcrumb-add li').removeClass('active');
        $('ul.breadcrumb-add li:nth-child(' + stt + ')').addClass('active');
        return false;
    });

    $('.step a.btn-back').click(function() {
        var stt = parseInt($(this).parent('.step').attr('idx'));
        stt = stt - 1;
        // alert(stt);
        $(this).parent('.step').hide(200);
        $(this).parent('.step').prev().show(200);
        $('ul.breadcrumb-add li').removeClass('active');
        $('ul.breadcrumb-add li:nth-child(' + stt + ')').addClass('active');
        return false;
    });
});