
$(document).ready(function () {
    $("#tproduct").DataTable({
        responsive: true,
    });
});

$(".tableProduct tbody").on("click", "button#delete", function () {
    var ProductId = $(this).attr("ProductId");
    swal.fire({
        title: "¿Esta seguro de borrar el producto?",
        text: "¡si no lo esta puede cancelar!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, Eliminar producto",
    }).then((result) => {
        if (result.value) {
            window.location = "/product/" + ProductId + "/delete";
        }
    });
});

$(".tableProduct tbody").on("click", "button.btnAddStock", function () {
    var ProductId = $(this).attr("productId");
    var route = "/product/addStock/" + ProductId;
    var token = $("#token").val();
    $.ajax({
        url: route,
        method: "PUT",
        headers: { "X-CSRF-TOKEN": token },
        dataType: "json",
        success: function (respuesta) {
            $("#name").val(respuesta["name"]);
            $("#product_id").val(respuesta["id"]);
        },
    });
});

$(".tableProduct tbody").on("click", "button.btnRestStock", function () {
    var ProductId = $(this).attr("productId");
    var route = "/product/addStock/" + ProductId;
    var token = $("#token").val();
    $.ajax({
        url: route,
        method: "PUT",
        headers: { "X-CSRF-TOKEN": token },
        dataType: "json",
        success: function (respuesta) {
            $("#names").val(respuesta["name"]);
            $("#product_id_2").val(respuesta["id"]);
        },
    });
});

// $("#save-stock").click(function()
// {
// 	var ProductId = $("#product_id").val();
// 	var stock = $("#stock").val();
// 	var route = "/product/saveStock/"+ProductId;
// 	var token = $("#token").val();
// 	$.ajax({
// 		url:route,
// 		headers:{'X-CSRF-TOKEN':token},
// 		method: "PUT",
// 		data:{stock:stock},
// 		dataType: "json",
// 		success: function(respuesta)
// 		{
// 		}
// 	});
// })
