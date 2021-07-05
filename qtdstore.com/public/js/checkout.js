$(document).ready(function() {
    $('input#banking').click(function() {
        $('.alert-box').slideDown(300);
    });

    $("input[name='delivery']").change(function() {
        var delivery = $(this).val();
        var region = $("select[name='region']").val();
        var data = { delivery: delivery, region: region }; // key: value
        $.ajax({
            url: "?mod=cart&action=check_info",
            method: 'POST',
            data: data,
            dataType: 'json', //json, text,
            success: function(data) {
                $('.shipping-fee').text(data.delivery_fee);
                $('.product-total').text(data.total_all);
            }
        });
    });

    $("select[name='region']").change(function() {
        var delivery = $("input[name='delivery']").val();
        var region = $(this).val();
        var data = { delivery: delivery, region: region }; // key: value
        $.ajax({
            url: "?mod=cart&action=check_info",
            method: 'POST',
            data: data,
            dataType: 'json', //json, text,
            success: function(data) {
                $('.shipping-fee').text(data.delivery_fee);
                $('.product-total').text(data.total_all);
            }
        });
    });
});