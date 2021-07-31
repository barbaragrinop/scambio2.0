$(document).ready(function(){
    $("#cep").on("change", function(){      
        if(this.value){
            $.ajax({
                url: 'https://api.postmon.com.br/v1/cep/' + this.value,
                dataType: "json", 
                crossDomain: true,
                statusCode:{
                    200: (data)=>{
                        console.log(data);
                        $("#cep").addClass("is-valid");
                        $("#rua").val(data.logradouro);
                        $("#bairro").val(data.bairro);
                        $("#cidade").val(data.cidade);
                        $("#estado").val(data.estado);
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