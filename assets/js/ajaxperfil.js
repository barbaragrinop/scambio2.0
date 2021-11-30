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


    if(oqE){
        $("#lbdel").html('Excluir postagem do livro ' + txtLb)
        $("#idlb").val(id)    
        $("#exampleModalLongD").modal("show")
    }
    else{
        $("#values").val(id)
        $("#descedit").val(txtDesc) 
        $("#uscity").val(UsCity) 
        $("#UFUs").val(UsUF) 
        $("#stedit").val(txtSt)
        $("#lbedit").val(txtLb)
        $("#lbautedit").val(txtlbaut)
        $("#lbgenero").val(txtGenero)
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


