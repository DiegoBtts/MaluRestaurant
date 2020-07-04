var token = $("#token").val();
var route = "/appointment/show";

$(".tableAppointment").dataTable({
    destroy: true,
    ajax: {
        url: route,
        headers: { "X-CSRF-TOKEN": token },
        type: "PUT",
    },
    language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ registros",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo:
            "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sInfoPostFix: "",
        sSearch: "Buscar:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
            sFirst: "Primero",
            sLast: "Último",
            sNext: "Siguiente",
            sPrevious: "Anterior",
        },
        oAria: {
            sSortAscending:
                ": Activar para ordenar la columna de manera ascendente",
            sSortDescending:
                ": Activar para ordenar la columna de manera descendente",
        },
    },
});

$("#client").change(function () {
    var flag = $("#code_encode").val();
    if (flag == "") {
        var id = $(this).val();
        var code = Math.floor(Math.random() * 10000) + "_" + id;
        JsBarcode("#barcode", code);
        var uSvg = document.getElementById("barcode");
        var src = "data:image/svg+xml;base64," + window.btoa(uSvg.outerHTML);
        $("#code_encode").val(src);
        $("#appointment_code").val(code);
    } else {
        console.log("me valio madre");
    }
});

$(".tableAppointment tbody").on("click", "button.btnPrintBarcode", function () {
    var barcode = $(this).attr("barcode");
    var sample = $(this).attr("sample");
    printBarcode(barcode, sample);
});

$(".tableAppointment tbody").on("click", "button.btnGetSample", function () {
    var AppointmentId = $(this).attr("idAppointment");
    swal.fire({
        title: "¿Desea recibir una muestra para esta cita?",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, recibir",
    }).then((result) => {
        if (result.value) {
            window.location = "/receiptsamples/add/" + AppointmentId;
        }
    });
});

$(".tableAppointment tbody").on("click", "button.btnDeleteItem", function () {
    var AppointmentId = $(this).attr("idItem");
    swal.fire({
        title: "¿Esta seguro de borrar la cita?",
        text: "¡si no lo esta puede cancelar!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, cancelar cita",
    }).then((result) => {
        if (result.value) {
            window.location = "/appointment/" + AppointmentId + "/delete";
        }
    });
});

$("#type").change(function () {
    var op = $(this).val();
    if (op == "1") {
        $(".hidden").css("display", "block");
        $("#guardar").prop("disabled", true);
    } else {
        $(".hidden").css("display", "none");
    }
});

function CheckDates(dates, time, horaComparativa) {
    console.log(time);
    console.log(horaComparativa);
    var data = new FormData();
    data.append("Dates", dates);
    data.append("Hour", time);
    data.append("comparative",horaComparativa);
    var route = "/appointment/CheckDates";
    var token = $("#token").val();
    $.ajax({
        url: route,
        headers: { "X-CSRF-TOKEN": token },
        data: data,
        method: "POST",
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            if (respuesta != false) {
                $("#hour").val("--:--:--");
                swal.fire({
                    title: "Ya existe una cita ese dia y en esa hora",
                    type: "info",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "ok",
                }).then((result) => {});
            } else {
                $("#guardar").prop("disabled", false);
            }
        },
    });
}

$("#hour").change(function () {
    var fecha = $("#date").val();
    var time = $("#hour").val();
    var horaSeparada = time.split(":");
    horaSeparada[1] = "59";
    var horaComparativa = horaSeparada[0] + ":" + horaSeparada[1];
    CheckDates(fecha, time, horaComparativa);
});
