
  $(document).ready(function () {
     $(".mdb-select").materialSelect();
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


function check(value){
    
document.getElementById(value).required =true;

}

