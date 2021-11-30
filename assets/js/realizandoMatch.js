

var stateClass = false;




function clickBtnMatch(idUser, idLivro) {

    // console.log("idUser", idUser, 'idLivro', idLivro)
    if (document.getElementById('btn-match').style.backgroundColor == 'rgb(172, 126, 85)') {
        document.getElementById('btn-match').style.backgroundColor = '#333';
        document.getElementById('btn-match').style.width = '55px';
        document.getElementById('btn-match').style.marginLeft = '5px';
        document.getElementById('btn-match').style.lineHeight = '17px';
        document.getElementById('btn-match').innerHTML = 'Match';
        guardaEstado(false)
        // console.warn(stateClass)
    } else {
        document.getElementById('btn-match').style.backgroundColor = 'rgb(172, 126, 85)';
        document.getElementById('btn-match').style.width = '69.5px';
        document.getElementById('btn-match').style.marginLeft = '2px';
        document.getElementById('btn-match').style.lineHeight = '19px';
        document.getElementById('btn-match').innerHTML = 'Desfazer Match';
        guardaEstado(true)
    }

    function guardaEstado(state){
        stateClass = state;
        document.getElement
    }

    $.ajax({
        type: "post",
        url: "php/match.php",
        data: {
            idUser: idUser,
            idLivro: idLivro,
            estadoBotao: stateClass 
        },
        success: function (response) {
            // console.warn(response)
            if(response == "sim"){
                swal("Match!", "Parabens!!!!!", "success");
            }
        }
    });
}
