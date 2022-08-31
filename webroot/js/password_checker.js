$(document).ready(function(){
    $(".confirm-password").keyup(checkPasswordMatch);
})

function checkPasswordMatch() {
    let password = $(".password").val();
    let confirmPassword = $(".confirm-password").val();
    if (password != confirmPassword)
    {
        $('.submit-profile').attr('disabled', 'disabled');
        $('.password-alert').html("<span class='text-danger'>Passwords does not match!</span>");
    }
    else{
        $('.submit-profile').removeAttr('disabled');
        $('.password-alert').html("<span class='text-success'>Passwords match.</span>");
    }
}
