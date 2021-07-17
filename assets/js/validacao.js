//veficando se o email já existe 
$(document).ready(function(){
    $('.check_email').change(function(e){
        var email = $('.check_email').val();
        $.ajax({
            type: "post",
            url: "./verificaEmail.php",
            data: {
                "check_submit_btn": 1,
                "email_id": email,
            },
            success: function (response) {
               alert(response);
            }
        });
    });
});
