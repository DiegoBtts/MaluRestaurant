$('#action').click(function(){
    if(res !=0){
     $('#action').attr('data-toggle','modal'); 
     $('#totalSales').val(total);  
     $('#comanda').val(comanda); 
    }else{
        swal.fire("¡Cuidado!", "No se ha iniciado una venta.", "warning");
    }
    
});
$(document).ready(function () {
    $("#btnImprimir").click(function () {
        $.ajax({
            url: "/sell/Ticket",
            type: "GET",
            success: function (response) {
                if (response == 1) {
                    alert("Imprimiendo....");
                } else {
                    alert("Error");
                }
            },
        });
    });
});
$(document).ready(function() {
    $('#formsell').submit(function(event) {
        var total = $('#totalSales').val();  
        var pago = $('#payment').val();

        if (pago >= total) {
            $('#error').text("");

            $('#total_table').text(total);
            $('#payment_table').text(pago);
            $('#change_table').text(pago-total);
            allowsubmit = true;
        }else{
            $('#error').text("Monto menor al total");
            $('#error').css("color", "#ff0000");
            allowsubmit = false; 
        }
        if (allowsubmit) {
            return true;
        } else {
            return false;
        }

         
    });

    $("#domicilioList").hide("fast");
$("#restauranteList").hide("fast");
$(document).on("click", "#restaurante", function(e) {
    console.log("entro al metodo restaurante");
    $("#domicilioList").hide("fast");
    $("#restauranteList").show("fast");
});
$(document).on("click", "#domicilio", function(e) {
    console.log("entro al metodo domicilio");
    $("#restauranteList").hide("fast");
    $("#domicilioList").show("fast");
});

});