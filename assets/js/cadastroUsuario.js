$(document).ready(function(){
    $('#salvar').click(() => {
        $.ajax({
            url: 'cadastroUsuario.php',
            type: 'post',
            data: $('#frm').serialize(),
            success: (a) =>{    
                alert(a);
                window.location.replace("login/login.php");
            },
            error: function(data){
                console.log(data);
            }
        });
    });
});