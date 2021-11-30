
$("#btn-del").click(() =>{
    var id = $('#idlb').val();
    $.ajax({
        type: "post",
        url: "PHP/delete.php",
        data:{
            'id':id
        },
        success: function (response) {
            $("#exampleModalLongD").modal("hide")
            Callajaxpub();
        }    
    })
})

function Callajaxpub() {
    $.ajax({
        type: "post",
        url: "PHP/select_livro_user.php",
        success: function (response) {
            $('.publicacoes').html(response);
        }
    }) 
}