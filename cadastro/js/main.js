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
                document.getElementById("myBtn").disabled = true;

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
            document.getElementById("myBtn").disabled = true;
            $('button').removeClass('classHover');
            $('button').addClass('pointer-none');
            // document.getElementById("myBtn").style.visibility = "hidden";

        }else {
            document.getElementById("myBtn").disabled = false;
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
            $('button').addClass('classHover');
            // document.getElementById("myBtn").style.visibility = "initial";
        }

    });

    $("#celular").focusout(function(){
        let celular = document.getElementById('celular').value.trim();
        
        
        if(celular == "(__) _____-____"){
            alert('Digite seu celular.');
            document.getElementById("myBtn").disabled = true;
            $('button').addClass('pointer-none');
            $('button').removeClass('classHover');
            document.getElementById("myBtn").style.visibility = "hidden";
        }else {
            document.getElementById("myBtn").disabled = false;
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
            $('button').addClass('classHover');
            document.getElementById("myBtn").style.visibility = "initial";
        }

    });

    $("#senha").focusout(function(){
        let senha = document.getElementById('senha').value.trim();
        
        
        if(senha == ""){
            alert('Senha não informado.');
            document.getElementById("myBtn").disabled = true;
            $('button').addClass('pointer-none');
            $('button').removeClass('classHover');
            document.getElementById("myBtn").style.visibility = "hidden";
        }else {
            document.getElementById("myBtn").disabled = false;
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
            $('button').addClass('classHover');
            document.getElementById("myBtn").style.visibility = "initial";
        }

    });

    $("#senhaConfirmacao").focusout(function(){
        let senhaConfirmacao = document.getElementById('senhaConfirmacao').value.trim();
        
        
        if(senhaConfirmacao == ""){
            alert('Confirmação de senha não informado.');
            document.getElementById("myBtn").disabled = true;
            $('button').addClass('pointer-none');
            $('button').removeClass('classHover');
            document.getElementById("myBtn").style.visibility = "hidden";
        }else {
            document.getElementById("myBtn").disabled = false;
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
            $('button').addClass('classHover');
            document.getElementById("myBtn").style.visibility = "initial";
        }

    });

    $("#dtnasc").focusout(function(){
        let dtnasc = document.getElementById('dtnasc').value.trim();
        
        
        if(dtnasc == ""){
            alert('Data de Nascimento não informado.');
            document.getElementById("myBtn").disabled = true;
            $('button').addClass('pointer-none');
            $('button').removeClass('classHover');
            document.getElementById("myBtn").style.visibility = "hidden";
        }else {
            document.getElementById("myBtn").disabled = false;
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
            $('button').addClass('classHover');
            document.getElementById("myBtn").style.visibility = "initial";
        }

    });

    $("#email").focusout(function(){
        let email = document.getElementById('email').value.trim();
        
        
        if(email == ""){
            alert('Email não informado.');
            document.getElementById("myBtn").disabled = true;
            $('button').addClass('pointer-none');
            $('button').removeClass('classHover');
            document.getElementById("myBtn").style.visibility = "hidden";
        }else {
            document.getElementById("myBtn").disabled = false;
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
            $('button').addClass('classHover');
            document.getElementById("myBtn").style.visibility = "initial";
        }

    });

    $("#cep").focusout(function(){
        let cep = document.getElementById('cep').value.trim();
        
        
        if(cep == "_____-___"){
            alert('CEP não informado.');
            document.getElementById("myBtn").disabled = true;
            $('button').addClass('pointer-none');
            $('button').removeClass('classHover');
            document.getElementById("myBtn").style.visibility = "hidden";
        }else {
            document.getElementById("myBtn").disabled = false;
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
            $('button').addClass('classHover');
            document.getElementById("myBtn").style.visibility = "initial";
        }

    });

    $("#cidade").focusout(function(){
        let cidade = document.getElementById('cidade').value.trim();
        
        
        if(cidade == ""){
            alert('Cidade não informado.');
            document.getElementById("myBtn").disabled = true;
            $('button').addClass('pointer-none');
            $('button').removeClass('classHover');
            document.getElementById("myBtn").style.visibility = "hidden";
        }else {
            document.getElementById("myBtn").disabled = false;
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
            $('button').addClass('classHover');
            document.getElementById("myBtn").style.visibility = "initial";
        }

    });

    $("#rua").focusout(function(){
        let rua = document.getElementById('rua').value.trim();
        
        
        if(rua == ""){
            alert('Rua não informado.');
            document.getElementById("myBtn").disabled = true;
            $('button').addClass('pointer-none');
            $('button').removeClass('classHover');
            document.getElementById("myBtn").style.visibility = "hidden";
        }else {
            document.getElementById("myBtn").disabled = false;
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
            $('button').addClass('classHover');
            document.getElementById("myBtn").style.visibility = "initial";
        }

    });

    $("#numero").focusout(function(){
        let numero = document.getElementById('numero').value.trim();
        
        
        if(numero == ""){
            alert('Numero não informado.');
            document.getElementById("myBtn").disabled = true;
            $('button').addClass('pointer-none');
            $('button').removeClass('classHover');
            document.getElementById("myBtn").style.visibility = "hidden";
        }else {
            document.getElementById("myBtn").disabled = false;
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
            $('button').addClass('classHover');
            document.getElementById("myBtn").style.visibility = "initial";
        }



    });

    $("#bairro").focusout(function(){
        let bairro = document.getElementById('bairronome').value.trim();
        
        
        if(bairro == ""){
            alert('Bairro não informado.');
            document.getElementById("myBtn").disabled = true;
            $('button').addClass('pointer-none');
            $('button').removeClass('classHover');
            document.getElementById("myBtn").style.visibility = "hidden";
        }else {
            document.getElementById("myBtn").disabled = false;
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
            $('button').addClass('classHover');
            document.getElementById("myBtn").style.visibility = "initial";
        }

    });

    $("#estado").focusout(function(){
        let estado = document.getElementById('estado').value.trim();
        
        
        if(estado == ""){
            alert('Estado não informado.');
            document.getElementById("myBtn").disabled = true;
            $('button').addClass('pointer-none');
            $('button').removeClass('classHover');
            document.getElementById("myBtn").style.visibility = "hidden";
        }else {
            document.getElementById("myBtn").disabled = false;
            $('button').removeClass('pointer-none');
            $('button').addClass('pointer-some');
            $('button').addClass('classHover');
            document.getElementById("myBtn").style.visibility = "initial";
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