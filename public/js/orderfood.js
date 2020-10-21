$(document).ready(function () {
    // $(".mdb-select").materialSelect();
    if ($("#titulo").text() == "Nuevo Comanda") {
        CheckValuesOrder("restaurante");
    }
    ActualDate();
    $(".mi-selector").select2({
        theme: "classic",
        placeholder: "Selecciona un producto",
    });
});

$(document).ready(function () {
    $("#ok").DataTable({
        aLengthMenu: [
            [5, 10, 25, -1],
            [5, 10, 25, "All"],
        ],
        iDisplayLength: 25,
        responsive: true,
        searching: false,
    });
});

$(document).ready(function () {
    $("#example").DataTable({
        iDisplayLength: 200,
        searching: false,
        language: {
            zeroRecords: " ",
        },
        responsive: true,
        paging: false,
        ordering: false,
        info: false,
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
    if (value == "Domicilio") {
        console.log("Entro acacacaca en domi");
        console.log("entro a domicilio");
        $("#order").prop("checked", true);
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
    } else if (value == "restaurante") {
        console.log("Entro acacacaca en rest");
        $("#restaurant").prop("checked", true);
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


function btnTables(value, id) {
    $("#" + value).prop("checked", true);
    $("#radonly" + id).css("background-color", "red");
    $("#some-content").hover(function () {
        $("#radonly" + id).css("background-color", "blue");
    });
}
function checkTables(value) {
    $(value).prop("checked", true);
}

$(document).ready(function () {
    $("select[name=color1]").change(function () {
        alert($("select[name=color1]").val());
        $("input[name=valor1]").val($(this).val());
    });
    $("#ejemplo2").change(function () {
        alert($("select[id=ejemplo2]").val());
        $("#valor2").val($(this).val());
    });
    $(".ejemplo3").change(function () {
        alert($("select[class=ejemplo3]").val());
        $(".valor3").val($(this).val());
    });
});

$(document).ready(function () {
    var cont = 1;
    var elementsSelect = [];
    $("#example .dataTables_empty").remove();
    $("#example .odd").remove();

    $(".mi-selector").change(function () {
        var value = $(".mi-selector").val();
        var array = value.split(",");
        var validator = false;

        var htmlTags =
            "<tr id='fila" +
            cont +
            "'>" +
            "<td>" +
            "<input type='checkbox' name='products[]' value='" +
            array[0] +
            "'onclick='check(" +
            array[0] +
            ")' id='cbox" +
            array[0] +
            "' checked disabled = true class='productsCheck'>" +
            "</td>" +
            "<td>" +
            +cont +
            "</td>" +
            "<td>" +
            array[1] +
            "</td>" +
            "<td>" +
            "<div class='col-md-4'>" +
            "<div class='form-group'>" +
            "<input type='number' name='quantity[]' id='" +
            array[0] +
            "'class='form-control dataT' required = true>" +
            "</div>" +
            "</div>" +
            "</td>" +
            "<td>" +
            "<div class='btn-group'>" +
            "<a onclick='deleteElement(" +
            cont +
            ")' class='btn btn-block btn-danger'>" +
            "<i class='fa fa-fw fa-trash'>" +
            "</i>" +
            "</a>" +
            "</div>" +
            "</td>" +
            "</tr>";

        if (elementsSelect.length == 0) {
            $("#example tbody").append(htmlTags);
            elementsSelect.push(array[0]);
            cont = cont + 1;
        }

        for (let index = 0; index < elementsSelect.length; index++) {
            if (validator) break;

            if (elementsSelect[index] == array[0]) {
                validator = true;
            }
        }

        if (!validator) {
            $("#example tbody").append(htmlTags);
            elementsSelect.push(array[0]);
            cont = cont + 1;
        }
    });
});



function disable() {
    $(".productsCheck").attr("disabled", false);
}

function deleteElement(id){
    $("#fila"+id).remove();
}