$(document).ready(function(){
    let toastLiveExample = document.getElementById('liveToast')
    let toast = new bootstrap.Toast(toastLiveExample)
    let parag = $('#resToast')
    $('#frmRestauraSenha').submit((e) => {
        e.preventDefault();
        let senha1 = $('#novaSenha1').val();
        let senha2 = $('#novaSenha2').val();
        if(senha1 != senha2){
            console.log("não coincidem")
        }
        $.ajax({
            type: "post",
            url: "../alteraSenha.php",
            data: {
                "senha1": senha1,
                "senha2": senha2
            },
            success: function (response) {
                if(response == 1){
                    retornoMsgToast(response)
                    setInterval(() => {
                        location.replace("http://localhost/scambio2.0/index.php")
                    }, 2000);
                }
                else{
                    retornoMsgToast(response)
                }
            }
        });
    });

    function retornoMsgToast(i){
        if(i == 1) {
            parag.html("Cadastro realizado com sucesso.")
            toast.show()
            return;
        } else{
            parag.html("Ocorreu um erro. Por favor, tente depois.")
            toast.show()
            return;
        }	
    }
});