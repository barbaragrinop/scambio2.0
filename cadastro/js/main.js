$(document).ready(function () {

    $("#cep").focusout(function () {
        var cep = $("#cep").val();
        cep = cep.replace("-", "");

        var urlStr = "https://viacep.com.br/ws/" + cep + "/json/";

        $.ajax({
            url: urlStr,
            type: "get",
            dataType: "json",
            success: function (data) {
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
            error: function (erro) {
                console.log(erro);
            }
        });
    });

    $("#nome").focusout(function () {
        let name = document.getElementById('nome').value.trim();

        // if (name == "") {
        //     var x = document.getElementById("snackbarnome");
        //     x.className = "show";
        //     setTimeout(function () { x.className = x.className.replace("show", ""); }, 4000);
        //     document.getElementById("salvar").disabled = true;
        //     $('button').removeClass('classHover');
        //     $('button').addClass('pointer-none');

        //     $('button').removeClass('pointer-some');

        // } else {
        //     document.getElementById("salvar").disabled = false;
        //     $('button').addClass('classHover');
        //     $('button').removeClass('pointer-none');
        //     $('button').addClass('pointer-some');

        // }

    });

    $("#celular").focusout(function () {
        let celular = document.getElementById('celular').value.trim();

        // if (celular == "(__) _____-____") {
        //     var x = document.getElementById("snackbarcelular");
        //     x.className = "show";
        //     setTimeout(function () { x.className = x.className.replace("show", ""); }, 4000);
        //     document.getElementById("salvar").disabled = true;
        //     $('button').removeClass('classHover');
        //     $('button').addClass('pointer-none');
        //     $('button').removeClass('pointer-some');

        // } else {
        //     document.getElementById("salvar").disabled = false;
        //     $('button').addClass('classHover');
        //     $('button').removeClass('pointer-none');
        //     $('button').addClass('pointer-some');
        // }

    });

    $("#senha").focusout(function () {
        let senha = document.getElementById('senha').value.trim();

        // if (senha == "") {
        //     var x = document.getElementById("snackbarsenha");
        //     x.className = "show";
        //     setTimeout(function () { x.className = x.className.replace("show", ""); }, 4000);
        //     document.getElementById("salvar").disabled = true;

        //     $('button').removeClass('classHover');
        //     $('button').addClass('pointer-none');
        //     $('button').removeClass('pointer-some');

        // } else {
        //     document.getElementById("salvar").disabled = false;
        //     $('button').addClass('classHover');
        //     $('button').removeClass('pointer-none');
        //     $('button').addClass('pointer-some');

        // }

    });

    $("#senhaConfirmacao").focusout(function () {
        let senhaConfirmacao = document.getElementById('senhaConfirmacao').value.trim();
        let senha = document.getElementById('senha').value.trim();

        // if (senhaConfirmacao == "") {
        //     var x = document.getElementById("snackbarSenhaConfirmacao");
        //     x.className = "show";
        //     setTimeout(function () { x.className = x.className.replace("show", ""); }, 4000);
        //     document.getElementById("salvar").disabled = true;

        //     $('button').removeClass('classHover');
        //     $('button').addClass('pointer-none');
        //     $('button').removeClass('pointer-some');

        // } else if (senha != senhaConfirmacao) {
        //     alert('Senhas não coincidem!')
        //     document.getElementById('senhaConfirmacao').value = ""
        // }
        // else {
        //     document.getElementById("salvar").disabled = false;
        //     $('button').addClass('classHover');
        //     $('button').removeClass('pointer-none');
        //     $('button').addClass('pointer-some');

        // }

    });

    $("#dtnasc").focusout(function () {
        let dtnasc = document.getElementById('dtnasc').value.trim();

        // if (dtnasc == "__/__/____") {
        //     var x = document.getElementById("snackbardtnasc");
        //     x.className = "show";
        //     setTimeout(function () { x.className = x.className.replace("show", ""); }, 4000);
        //     document.getElementById("salvar").disabled = true;
        //     $('button').removeClass('classHover');
        //     $('button').addClass('pointer-none');
        //     $('button').removeClass('pointer-some');

        // } else {
        //     document.getElementById("salvar").disabled = false;
        //     $('button').addClass('classHover');
        //     $('button').removeClass('pointer-none');
        //     $('button').addClass('pointer-some');
        // }

    });

    $("#email").focusout(function () {
        let email = document.getElementById('email').value.trim();
        var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

        // if (email == "") {
        //     var x = document.getElementById("snackbaremail");
        //     x.className = "show";
        //     setTimeout(function () { x.className = x.className.replace("show", ""); }, 4000);
        //     document.getElementById("salvar").disabled = true;
        //     $('button').removeClass('classHover');
        //     $('button').addClass('pointer-none');
        //     $('button').removeClass('pointer-some');

        // } else if (!email.match(pattern)) {
        //     alert('Email inválido!')
        //     document.getElementById('email').value = ""
        // }
        // else {
        //     document.getElementById("salvar").disabled = false;
        //     $('button').addClass('classHover');
        //     $('button').removeClass('pointer-none');
        //     $('button').addClass('pointer-some');
        // }

    });

    $("#cep").focusout(function () {
        var cep = document.getElementById('cep').value.trim();
        var cep = cep.replace("-", "").replace(".", "");
        let rua = document.getElementById('rua').value.trim();

        // if (cep == "________") {
        //     var x = document.getElementById("snackbarcep");
        //     x.className = "show";
        //     setTimeout(function () { x.className = x.className.replace("show", ""); }, 4000);
        //     document.getElementById("salvar").disabled = true;
        //     $('button').removeClass('classHover');
        //     $('button').addClass('pointer-none');
        //     $('button').removeClass('pointer-some');

        // } else {
        //     document.getElementById("salvar").disabled = false;
        //     $('button').addClass('classHover');
        //     $('button').removeClass('pointer-none');
        //     $('button').addClass('pointer-some');
        // }

    });

    $("#cidade").focusout(function () {
        let cidade = document.getElementById('cidade').value.trim();

        // if (cidade == "") {
        //     var x = document.getElementById("snackbarcidade");
        //     x.className = "show";
        //     setTimeout(function () { x.className = x.className.replace("show", ""); }, 4000);
        //     document.getElementById("salvar").disabled = true;
        //     $('button').removeClass('classHover');
        //     $('button').addClass('pointer-none');
        //     $('button').removeClass('pointer-some');

        // } else {
        //     document.getElementById("salvar").disabled = false;
        //     $('button').addClass('classHover');
        //     $('button').removeClass('pointer-none');
        //     $('button').addClass('pointer-some');
        // }

    });

    $("#rua").focusout(function () {
        let rua = document.getElementById('rua').value.trim();

        // if (rua == "") {
        //     var x = document.getElementById("snackbarrua");
        //     x.className = "show";
        //     setTimeout(function () { x.className = x.className.replace("show", ""); }, 4000);
        //     document.getElementById("salvar").disabled = true;
        //     $('button').removeClass('classHover');
        //     $('button').addClass('pointer-none');
        //     $('button').removeClass('pointer-some');

        // } else {
        //     document.getElementById("salvar").disabled = false;
        //     $('button').addClass('classHover');
        //     $('button').removeClass('pointer-none');
        //     $('button').addClass('pointer-some');
        // }

    });

    $("#numero").focusout(function () {
        let numero = document.getElementById('numero').value.trim();

        // if (numero == "") {
        //     var x = document.getElementById("snackbarnumero");
        //     x.className = "show";
        //     setTimeout(function () { x.className = x.className.replace("show", ""); }, 4000);
        //     document.getElementById("salvar").disabled = true;
        //     $('button').removeClass('classHover');
        //     $('button').addClass('pointer-none');
        //     $('button').removeClass('pointer-some');

        // } else {
        //     document.getElementById("salvar").disabled = false;
        //     $('button').addClass('classHover');
        //     $('button').removeClass('pointer-none');
        //     $('button').addClass('pointer-some');
        // }

    });

    $("#bairro").focusout(function () {
        let bairro = document.getElementById('bairronome').value.trim();

        // if (bairro == "") {
        //     var x = document.getElementById("snackbarbairro");
        //     x.className = "show";
        //     setTimeout(function () { x.className = x.className.replace("show", ""); }, 4000);
        //     document.getElementById("salvar").disabled = true;
        //     $('button').removeClass('classHover');
        //     $('button').addClass('pointer-none');
        //     $('button').removeClass('pointer-some');

        // } else {
        //     document.getElementById("salvar").disabled = false;
        //     $('button').addClass('classHover');
        //     $('button').removeClass('pointer-none');
        //     $('button').addClass('pointer-some');
        // }

    });

    $("#estado").focusout(function () {
        let estado = document.getElementById('estado').value.trim();

        // if (estado == "") {
        //     var x = document.getElementById("snackbarestado");
        //     x.className = "show";
        //     setTimeout(function () { x.className = x.className.replace("show", ""); }, 4000);
        //     document.getElementById("salvar").disabled = true;
        //     $('button').removeClass('classHover');
        //     $('button').addClass('pointer-none');
        //     $('button').removeClass('pointer-some');

        // } else {
        //     document.getElementById("salvar").disabled = false;
        //     $('button').addClass('classHover');
        //     $('button').removeClass('pointer-none');
        //     $('button').addClass('pointer-some');
        // }

    });
});


(function ($) {
    "use strict";

    var input = $('.validate-input .input100');

    $('.validate-form').on('submit', function () {
        var check = true;

        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });

    function validate(input) {
        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if ($(input).val().trim() == '') {
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