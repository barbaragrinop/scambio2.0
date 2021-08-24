
$(document).ready(function(){
    $('#frmRecupera').submit(() => {
        var emailManda = $('#recemail').val();
        if(!emailManda)
        {
            alert("E-mail inválido");
            return;
        }
        $.ajax({
            type: "post",
            url: "../esqueciSenha.php",
            data: {
                "email": emailManda
            },
            success: function (response) {
                // alert(response);
            }, 
            error: function (response) { 
                alert(response);
            }
        });
    });
});