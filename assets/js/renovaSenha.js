// $(document).ready(function(){
//     $('#frmRestauraSenha').submit(() => {
//         var senha1 = $('#novaSenha1').val();
//         var senha2 = $('#novaSenha2').val();
//         if(senha1 != senha2){
//             console.log("As senhas não coincidem.");
//             return;
//         }
//         $.ajax({
//             type: "post",
//             url: "../validarcodigo.php",
//             data: {
//                 "novaSenha1": senha1,
//                 "novaSenha2": senha2
//             },
//             success: function (response) {
//                 alert(response);
//             }
//         });
//     });
// });