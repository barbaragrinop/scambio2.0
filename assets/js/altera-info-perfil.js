$(document).ready(function () {
    $('#form-alterar-publicacao').submit((e) => {
        e.preventDefault()
        $.ajax({
            type: "post",
            url: "PHP/update-pub.php",
            data: $("#form-alterar-publicacao").serialize(),
            success: function (response) {
                console.warn(response)
            }
        });
    })
});