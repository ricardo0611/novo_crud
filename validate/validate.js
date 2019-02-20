$('#myform > input').on('input', function () {
    var empty = false;
    $('form > input, form > select, form > textarea').each(function () {
        if ($(this).val() == '') {
            empty = true;
        }
    });

    if (empty) {
        $('#register').attr('disabled', 'disabled');
    } else {
        $('#register').removeAttr('disabled');
    }
});