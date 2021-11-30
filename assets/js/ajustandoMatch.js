function inserindoMatch(idSession, idEnviado, idPublicacao) {
    $.ajax({
        type: "post",
        url: "PHP/matchLigacao.php",
        data: {
            idSession: idSession, 
            idEnviado: idEnviado,
            idPublicacao: idPublicacao
        },
        success: function (response) {
            if(response != 0) {
                window.location.href = "../chat/users-all.php?user_id=" + response;
            } else {
                console.log("erro")
            }
        }
    });
}