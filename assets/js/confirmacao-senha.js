$(document).ready(function() {
    $('#conf').keyup(function(){
        let senha = $('#senha').val();
        let confirma = $('#conf').val();
        if (senha != confirma) { 
            $('#result').addClass("resultado");
            $('#result').html("As senhas não coincidem!");
        } else{
            $('#result').html("As senhas coincidem!");           
            $('#result').addClass("resultadoq");

        }
    })
})
