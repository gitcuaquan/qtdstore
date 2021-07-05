$(document).ready(function() {
    var num = $('input.qty').val();

    $('a.num-plus').click(function() {
        num++;
        $('a.num-minus').removeClass('disable');
        if (num > 9) {
            $('a.num-plus').addClass('disable');
            num = 10;
            $('input.qty').val(num);
        } else {
            $('input.qty').val(num);
        }
        return false;
    });
    $('a.num-minus').click(function() {
        num--;
        $('a.num-plus').removeClass('disable');
        if (num < 2) {
            $('a.num-minus').addClass('disable');
            num = 1;
            $('input.qty').val(num);
        } else {
            $('input.qty').val(num);
        }
        return false;
    });

});