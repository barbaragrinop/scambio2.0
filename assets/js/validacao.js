//veficando se o email já existe 
$(document).ready(function(){
    $('#email').change(function(e){
        $('#myModal').modal('show');
        var email = $('#email').val();
        $.ajax({
            type: "post",
            url: "./verificaEmail.php",
            data: {
                "check_submit_btn": 1,
                "email_id": email,
            },
            success: function (response) {
                $('#retornoEmail').html(response);
            }
        });
    });
});
