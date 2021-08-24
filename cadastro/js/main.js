$(document).ready(function(){
    $("#cep").focusout(function(){
        var cep = $("#cep").val();
        cep = cep.replace("-", "");

        var urlStr = "https://viacep.com.br/ws/"+ cep +"/json/";

        $.ajax({
            url : urlStr,
            type : "get",
            dataType : "json",
            success : function(data){
                console.log(data);

                $("#cidade").val(data.localidade);
                $("#estado").val(data.uf);
                $("#bairro").val(data.bairro);
                $("#rua").val(data.logradouro);

                document.getElementById("cidade").readOnly = true;
                document.getElementById("estado").readOnly = true;
                document.getElementById("bairro").readOnly = true;
                document.getElementById("rua").readOnly = true;
                document.getElementById("salvar").disabled = true;

            },
            error : function(erro){
                console.log(erro);
            }
        });
    });

    $("#nome").focusout(function(){
        let name = document.getElementById('nome').value.trim();
        
        
        if(name == ""){
            alert('Digite seu nome.');
            document.getElementById("salvar").disabled = true;
            $('button').removeClass('classHover');
            $('button').addClass('pointer-none');
            $('button').removeClass('pointer-some');

        }else {
            document.getElementById("salvar").disabled = false;
            $('button').addClass('classHover');
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
        }

    });

    $("#celular").focusout(function(){
        let celular = document.getElementById('celular').value.trim();
        
        
        if(celular == "(__) _____-____"){
            alert('Digite seu celular.');
            document.getElementById("salvar").disabled = true;
            $('button').removeClass('classHover');
            $('button').addClass('pointer-none');
            $('button').removeClass('pointer-some');

        }else {
            document.getElementById("salvar").disabled = false;
            $('button').addClass('classHover');
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
        }

    });

    $("#senha").focusout(function(){
        let senha = document.getElementById('senha').value.trim();
        
        
        if(senha == ""){
            alert('Senha não informado.');
            document.getElementById("salvar").disabled = true;
            $('button').removeClass('classHover');
            $('button').addClass('pointer-none');
            $('button').removeClass('pointer-some');

        }else {
            document.getElementById("salvar").disabled = false;
            $('button').addClass('classHover');
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
        }

    });

    $("#senhaConfirmacao").focusout(function(){
        let senhaConfirmacao = document.getElementById('senhaConfirmacao').value.trim();
        let senha = document.getElementById('senha').value.trim();
        
        
        if(senhaConfirmacao == ""){
            alert('Confirmação de senha não informado.');
            document.getElementById("salvar").disabled = true;
            $('button').removeClass('classHover');
            $('button').addClass('pointer-none');
            $('button').removeClass('pointer-some');

        } else if(senha != senhaConfirmacao){
            alert('Senhas não coincidem!')
            document.getElementById('senhaConfirmacao').value = ""
        }
        else {
            document.getElementById("salvar").disabled = false;
            $('button').addClass('classHover');
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
        }

    });

    $("#dtnasc").focusout(function(){
        let dtnasc = document.getElementById('dtnasc').value.trim();
        
        
        if(dtnasc == ""){
            alert('Data de Nascimento não informado.');
            document.getElementById("salvar").disabled = true;
            $('button').removeClass('classHover');
            $('button').addClass('pointer-none');
            $('button').removeClass('pointer-some');

        }else {
            document.getElementById("salvar").disabled = false;
            $('button').addClass('classHover');
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
        }

    });

    $("#email").focusout(function(){
        let email = document.getElementById('email').value.trim();

        var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        
        
        if(email == ""){
            alert('Email não informado.');
            document.getElementById("salvar").disabled = true;
            $('button').removeClass('classHover');
            $('button').addClass('pointer-none');
            $('button').removeClass('pointer-some');

        } else if(!email.match(pattern)) {
            alert('Email inválido!')
            document.getElementById('email').value = ""
        }
        else {
            document.getElementById("salvar").disabled = false;
            $('button').addClass('classHover');
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
        }

    });

    $("#cep").focusout(function(){
        let cep = document.getElementById('cep').value.trim();
        
        
        if(cep == "_____-___"){
            alert('CEP não informado.');
            document.getElementById("salvar").disabled = true;
            $('button').removeClass('classHover');
            $('button').addClass('pointer-none');
            $('button').removeClass('pointer-some');

        }else {
            document.getElementById("salvar").disabled = false;
            $('button').addClass('classHover');
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
        }

    });

    $("#cidade").focusout(function(){
        let cidade = document.getElementById('cidade').value.trim();
        
        
        if(cidade == ""){
            alert('Cidade não informado.');
            document.getElementById("salvar").disabled = true;
            $('button').removeClass('classHover');
            $('button').addClass('pointer-none');
            $('button').removeClass('pointer-some');

        }else {
            document.getElementById("salvar").disabled = false;
            $('button').addClass('classHover');
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
        }

    });

    $("#rua").focusout(function(){
        let rua = document.getElementById('rua').value.trim();
        
        
        if(rua == ""){
            alert('Rua não informado.');
            document.getElementById("salvar").disabled = true;
            $('button').removeClass('classHover');
            $('button').addClass('pointer-none');
            $('button').removeClass('pointer-some');

        }else {
            document.getElementById("salvar").disabled = false;
            $('button').addClass('classHover');
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
        }

    });

    $("#numero").focusout(function(){
        let numero = document.getElementById('numero').value.trim();
        
        
        if(numero == ""){
            alert('Numero não informado.');
            document.getElementById("salvar").disabled = true;
            $('button').removeClass('classHover');
            $('button').addClass('pointer-none');
            $('button').removeClass('pointer-some');

        }else {
            document.getElementById("salvar").disabled = false;
            $('button').addClass('classHover');
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
        }



    });

    $("#bairro").focusout(function(){
        let bairro = document.getElementById('bairronome').value.trim();
        
        
        if(bairro == ""){
            alert('Bairro não informado.');
            document.getElementById("salvar").disabled = true;
            $('button').removeClass('classHover');
            $('button').addClass('pointer-none');
            $('button').removeClass('pointer-some');

        }else {
            document.getElementById("salvar").disabled = false;
            $('button').addClass('classHover');
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
        }

    });

    $("#estado").focusout(function(){
        let estado = document.getElementById('estado').value.trim();
        
        
        if(estado == ""){
            alert('Estado não informado.');
            document.getElementById("salvar").disabled = true;
            $('button').removeClass('classHover');
            $('button').addClass('pointer-none');
            $('button').removeClass('pointer-some');

        }else {
            document.getElementById("salvar").disabled = false;
            $('button').addClass('classHover');
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
        }

    }); 
});


(function ($) {
    "use strict";

    
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);