$(document).ready(function(){
    $('#frmRecupera').submit(() => {
        var emailManda = $('#recemail').val();
        $.ajax({
            type: "post",
            url: "esqueciSenha.php",
            data: {
                "email": emailManda
            },
            success: function (response) {
                alert(response);
            }
        });
    });
});