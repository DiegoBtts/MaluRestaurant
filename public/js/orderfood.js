$(document).ready(function () {
    // $(".mdb-select").materialSelect();
    $("#tablenumber").show("fast");
    $("#address").hide("fast");
    $("#phone").hide("fast");
    $("#restaurant").prop("checked", true);
    var date = new Date();
    var hora = date.getHours() + ":" + date.getMinutes();
    $("#hour").val(hora);
    var fecha =
        date.getMonth() + 1 + "-" + date.getDate() + "-" + date.getFullYear();
    $("#date").val(fecha);
    $("#date").prop("disabled", true);
});

$(document).ready(function () {
    $("#example").DataTable({
        aLengthMenu: [
            [5, 10, 25, -1],
            [5, 10, 25, "All"],
        ],
        iDisplayLength: 5,
    });
});

function checkAll(bx) {
    var cbs = document.getElementsByTagName("input");
    for (var i = 0; i < cbs.length; i++) {
        if (cbs[i].type == "checkbox") {
            cbs[i].checked = bx.checked;
        }
    }
}

$(".tableOrderFood").dataTable();

$(".tableOrderFood tbody").on("click", "button#delete", function () {
    var OrderFoodId = $(this).attr("OrderFoodId");
    swal.fire({
        title: "¿Esta seguro de borrar la orden?",
        text: "¡si no lo esta puede cancelar!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, Eliminar Comanda",
    }).then((result) => {
        if (result.value) {
            window.location = "/orderfood/" + OrderFoodId + "/delete";
        }
    });
});

function check(value) {
    document.getElementById(value).required = true;
}

function CheckValuesOrder(value) {
    console.log(value);
    if (value == "Domicilio") {
        $("#tablenumber").hide("fast");
        $("#address").show("fast");
        $("#phone").show("fast");
    } else if (value == "Restaurante") {
        $("#tablenumber").show("fast");
        $("#address").hide("fast");
        $("#phone").hide("fast");
    }
}

function CheckValuesRes() {}
