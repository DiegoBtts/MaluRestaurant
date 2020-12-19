var elementsSelect = [];
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
    $("#comandTable").dataTable({
        ordering: false,
        paging: false,
        info: false,
        searching: false,
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

    $(".mi-selector").change(function () {
        var value = $(".mi-selector").val();
        var array = value.split(",");
        var validator = false;

        var t = $("#example").DataTable();
        var counter = 1;
        let validatorExistent = $("#cbox"+array[0]).val();
        let checkboxElement =
            "<input type='checkbox' name='products[]' value='" +
            array[0] +
            "'onclick='check(" +
            array[0] +
            ")' id='cbox" +
            array[0] +
            "' checked disabled = true class='productsCheck' required = true >";
        let nameProducts = array[1];
        let inputQuantity =
            "<div class='col-md-4'>" +
                "<div class='form-group'>" +
                "<input type='number' name='quantity[]' id='" +
                array[0] +
                "'class='form-control dataT' required = true>" +
                "</div>" +
                "</div>";
        let inputUnitPrice =
            "<div class='col-md-4'>" +
                "<div class='form-group'>" +
                "<input type='number' id='price" +
                array[0] +
                "'class='form-control dataT' value='" +
                array[3] +
                "' disabled = true >" +
                "</div>" +
                "</div>";
        let buttonDeleteElement =
            "<div class='btn-group'>" +
                "<a onclick='deleteElement(" +
                array[0] +
                ")' class='btn btn-block btn-danger'>" +
                "<i class='fa fa-fw fa-trash'>" +
                "</i>" +
                "</a>" +
                "</div>";
                // console.log($("#cbox"+array[0]).val());

                if (cont == 1 || validatorExistent == undefined) {
                    var id = t.row(this).id();
                    console.log(id);
                    t.row
                        .add([
                            checkboxElement,
                            nameProducts,
                            inputQuantity,
                            inputUnitPrice,
                            buttonDeleteElement,
                        ])
                        .draw(false)
                        .node().id = "row"+array[0];
                }

            counter++;
            cont++;
    });
});

function disable() {
    $(".productsCheck").attr("disabled", false);
}

function deleteElement(id) {
    let table = $("#example").DataTable();
    table.row("#row"+id).remove().draw();

    removeItemFromArr(id);
}

function datatableIsNull() {
    // var validatorDataTable =
    //     "<tr id='tentacles'><td><input type='number' required = 'true'></td></tr>";
    // if ($("#example tr").length == 1) {
    //     $("#example tbody").append(validatorDataTable);
    //     $("#tentacles").hide("fast");
    // } else {
    //     $("#tentacles").remove();
    // }
}
function removeItemFromArr(item) {
    for (let index = 0; index < elementsSelect.length; index++) {
        if (elementsSelect[index] == item) {
            elementsSelect.splice(index, 1);
        }
        console.log(elementsSelect[index]);
    }

    for (let index = 0; index < elementsSelect.length; index++) {
        console.log(elementsSelect[index]);
    }
}

function clearDatatable() {
    $("#comandTable").dataTable().fnClearTable();
}
