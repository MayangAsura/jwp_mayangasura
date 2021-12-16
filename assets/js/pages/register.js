

$('#repeat_password').on('keyup', function () {
    if ($(this).val() == $('#password').val()) {
      $('#messagepassword').html('<small></small>').css('color', 'green');
    } else $('#messagepassword').html('<small>Password tidak sama</small>').css('color', 'red');
});