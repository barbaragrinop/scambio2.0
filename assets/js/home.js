$(document).ready(function(){
    $("#search").on('keyup', function(e){
    e.preventDefault();
    var search = $("#search").val();
        $.ajax ({
            type: "POST",
            url: 'backhome.php',
            data:search,
            success: function (data) {
                console.log(data)
            }, 
            error: function (response) { 
                alert(response);
            }
        });
    })
});