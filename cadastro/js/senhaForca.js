function validarSenhaForca() {
    var senha = document.getElementById('senha').value;
    var forca = 0;

    if ((senha.length >= 4) && (senha.length <= 7)) {
        forca += 10;
    } else if (senha.length > 7) {
        forca += 25;
    }

    if ((senha.length >= 5) && (senha.match(/[a-z]+/))) {
        forca += 10;
    }

    if ((senha.length >= 6) && (senha.match(/[A-Z]+/))) {
        forca += 20;
    }

    if ((senha.length >= 7) && (senha.match(/[@#$%&;*]/))) {
        forca += 25;
    }

    if (senha.match(/([1-9]+)\1{1,}/)) {
        forca += -25;
    }

    mostrarForca(forca);
}

function mostrarForca(forca) {

    if (forca < 1) {
        document.getElementById("impSenha").innerHTML = "Digite uma senha com mais de 3 caraceteres.";
    }
    else if (forca < 20) {
        document.getElementById("impSenha").innerHTML = "Senha fraca.";
    } else if ((forca >= 20) && (forca < 40)) {
        document.getElementById("impSenha").innerHTML = "Senha média.";
    } else if ((forca >= 40) && (forca < 60)) {
        document.getElementById("impSenha").innerHTML = "Senha forte.";
    } else if ((forca >= 60) && (forca < 90)) {
        document.getElementById("impSenha").innerHTML = "Senha excelente.";
    }
}