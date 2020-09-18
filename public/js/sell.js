$("#action").click(function () {
    if (res != 0) {
        $("#action").attr("data-toggle", "modal");
        $("#totalSales").val(total);
        $("#comanda").val(comanda);
    } else {
        swal.fire("¡Cuidado!", "No se ha iniciado una venta.", "warning");
    }
});
$("#deleteAll").click(function () {
    res = 0;
    comanda = 0;
    total = 0;
    $("#search").removeAttr("disabled");
    $("#find").attr("data-toggle", "modal");
    $("#content_table_sell td").remove();
    $("#total").text("");
    $("#totalSales").val("");
    $("#comanda").val("");
    $("#action").removeAttr("data-toggle");
    console.log($("#content_table_sell td").length);
});

$(document).ready(function () {
    $("#domicilioList").hide("fast");
    $("#restauranteList").hide("fast");
    $(document).on("click", "#restaurante", function (e) {
        console.log("entro al metodo restaurante");
        $("#domicilioList").hide("fast");
        $("#restauranteList").show("fast");
    });
    $(document).on("click", "#domicilio", function (e) {
        console.log("entro al metodo domicilio");
        $("#restauranteList").hide("fast");
        $("#domicilioList").show("fast");
    });
});


