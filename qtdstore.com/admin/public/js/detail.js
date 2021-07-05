$(document).ready(function() {
    $("#edit").click(function() {
        $("#confirm").addClass('bg');
        $("#confirm").removeAttr('disabled');
        $(".can").removeAttr('disabled');
        return false;
    });
});