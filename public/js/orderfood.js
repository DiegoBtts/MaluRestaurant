$(document).ready(function () {
    // $(".mdb-select").materialSelect();
    CheckValuesOrder("Restaurante");
    ActualDate();
    $("#restaurant").prop("checked", true);
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
        console.log("entro a domicilio");
        $("#tablenumber").hide("fast");
        $("#daddress").show("fast");
        $("#dphone").show("fast");
        $("#dname").show("fast");
        $("#dlast_name").show("fast");
        $("#phone").attr("required", true);
        $("#address").attr("required", true);
        $("#dname").attr("required", true);
        $("#dlast_name").attr("required", true);
        $(".options").attr("required", false);
    } else if (value == "Restaurante") {
        $("#tablenumber").show("fast");
        $("#daddress").hide("fast");
        $("#dphone").hide("fast");
        $("#dname").hide("fast");
         $("#dlast_name").hide("fast");
        $("#phone").attr("required", false);
        $("#address").attr("required", false);
        $("#dname").attr("required", false);
        $("#dlast_name").attr("required", false);
        $(".options").attr("required", true);
        
    }
}

function CheckValuesRes() {}

function ActualDate() {
    var date = new Date();
    var month = date.getMonth();
    var datetime = date.getDate();
    var year = date.getFullYear();
    if (month != 12) {
        if (month < 9) {
            month = "0" + (month + 1);
        } else {
            month = month + 1;
        }
    }

    if (datetime < 10) {
        datetime = "0" + datetime;
    }
    var fecha = year + "-" + month + "-" + datetime;
    $("#date").val(fecha);
    $("#date").prop("disabled", true);

    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? "pm" : "am";
    minutes = minutes < 10 ? "0" + minutes : minutes;
    var strTime = 0 + hours + ":" + minutes;
    $("#hour").val(strTime);
    $("#hour").prop("disabled", true);
}

function addcheck(value) {
    var cbox = "cbox" + value;
    $("#" + cbox).prop("checked", true);
}
function validateCbox(value) {
    var cbox = "cbox" + value;
    if ($("#" + value).val() == "") {
        $("#" + cbox).prop("checked", false);
    }
}

function btnTables(value, id) {
    $("#" + value).prop("checked", true);
    $("#radonly" + id).css("background-color", "red");
    $("#some-content").hover(function () {
        $("#radonly" + id).css("background-color", "blue");
    });
}

