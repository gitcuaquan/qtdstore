$(document).ready(function() {
    $('input.qty').change(function() {
        var id = $(this).attr('data-id');
        var qty = $(this).val();
        var data = { qty: qty, id: id }; // key: value
        $.ajax({
            url: "?mod=cart&action=update&id=" + id,
            method: 'POST',
            data: data,
            dataType: 'json', //json, text,
            success: function(data) {
                $('.num_order').text(data.num_order);
                $("#sub-total-" + id).text(data.sub_total);
                $(".product-total").text(data.total);
            }
        });
    });

});