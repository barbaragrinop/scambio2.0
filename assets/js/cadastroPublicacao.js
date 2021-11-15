
const form = document.querySelector("#frmRecuperaCodigo"), 
btnCad = document.querySelector("#btnCadastrar"),
toast = document.querySelector("#myToast")

form.onsubmit = (e) => {
    e.preventDefault();
}

btnCad.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST",'../home/PHP/cadastra-livro.php', true)
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            let data = xhr.response
            console.log(data);
            
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

$("#btncadastrar").click( () => {
    $.ajax({
        type: "post",
        url: "PHP/SELECT_LIVROS_PUBLICADOS.php",
        data: {
            "search": filtro,
        },
        success: function (response) {
            $('.return').html(response);
        }
        
    })
})