function Callajaxpub() {
    $.ajax({
        type: "post",
        url: "PHP/select_livro_user.php",
        success: function (response) {
            $('.publicacoes').html(response);
        }
    }) 
}

function update(){
    const form = document.querySelector("#formupdate")
    $('#formupdate').submit(function(){
        let xhr = new XMLHttpRequest();
        xhr.open("POST",'../perfil/PHP/update_info_user.php', true)
        xhr.onload = () => {
            if(xhr.readyState === XMLHttpRequest.DONE){
                let data = xhr.response
                console.log(data);               
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);
    })
    setInterval(window.location.reload(), 50)
}



/* FILTRO CEP */
$(document).ready( () => {
    setInterval(Callajaxperfil(), 2000)
    setInterval(Callajaxpub(), 500)
    $('#CEP').mask('00000-000');
    document.getElementById('uscity').disabled = false;
    document.getElementById('UFUs').disabled = false;   
    $("#CEP").on("change", function(){    
        if(this.value){
            $.ajax({
                url: 'https://api.postmon.com.br/v1/cep/' + this.value,
                dataType: "json", 
                crossDomain: true,
                statusCode:{
                    200: (data)=>{
                        console.log(data);
                        $("#cep").addClass("is-valid");
                        $("#uscity").val(data.cidade);
                        $("#UFUs").val(data.estado);
                    },
                    400: (msg)=>{
                        console.log(400)
                        console.log(msg); //request error
                    },
                    404: (msg)=>{
                        console.log(404)
                        console.log(msg);// cpf invalido
                    }
                },
                success: function () {
                    retorno = 2;
                    console.log(retorno)
                }
           });
        }
    })
})


/* CARREGA MODAL COM AS INFORMAÇÕES DA PUBLICAÇÃO  */
function carregaModal(id, oqE){
    var txtDesc = $("#Itemdesc"+id).text().trim()
    var txtGenero = $("#Itemge"+id).text().trim()
    var txtSt = $("#Itemst"+id).text().trim().split(":")[1]
    var txtLb= $("#Itemlb"+id).text().trim()
    var UsCity= $("#CityUs"+id).val()
    var UsUF= $("#UFUs"+id).val()
    var txtlbaut= $("#Itemaut"+id).text().trim()
    var imgItem = $("#Itemimg"+id).attr("src")+""
    var id = $("#Itemimg"+id).attr("src")+""

    console.log(imgItem)

    if(oqE){
        $("#lbdel").html('Excluir postagem do livro ' + txtLb)
        $("#idlb").val(id)
        $("#exampleModalLongD").modal("show")
    }
    else{
        $("#descedit").val(txtDesc) 
        $("#uscity").val(UsCity) 
        $("#UFUs").val(UsUF) 
        $("#stedit").val(txtSt)
        $("#lbedit").val(txtLb)
        $("#lbautedit").val(txtlbaut)
        $("#lbgenero").val(txtGenero)
        document.getElementById("imgedit").src =  imgItem+""
        $("#exampleModalLongE").modal("show")
    }
}

/* POPULA DIV EDIT-PROFILE */

function Callajaxperfil() {
    $.ajax({
        type: "post",
        url: "PHP/select_info_user.php",
        success: function (response) {
            $('#editprofile').html(response);
        }
    }) 
}
