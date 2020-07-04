$('#search').on('keyup', function(e)
{
    if(e.keyCode == 13)
    {
        var code = $(this).val();
        addAppointmentTable(code);
    }
})


$(".tableSell").on("click", "button.removeA", function()
{
    $(this).parent().parent().parent().remove();
    addAppointmentsArray();
    calculateTotal();
})

$(".list-group-item").click(function()
{   
    var code = $(this).attr("code");
    addAppointmentTable(code);
    $('#code_search').modal('hide');
    flag=true;
});

$("#find").click(function()
{
    flag = false;
    $('#code_search').modal({backdrop: 'static', keyboard: false})
})

$("#find_code").select2(
{
    width:'resolve'
});

$("#action").click(function()
{
    if (total!=0)
    {
        flag = false;
        $('#modalSell').modal({backdrop: 'static', keyboard: false})
        $('#modalSell').modal('show');
        $("#total-two").html(total);
        $("#payment").focus();
    }
    else
    {
        toastr.error('La venta esta en ceros');
    }
})

$("#cancel, #close_find").click(function()
{
    flag=true;
})

$("#sale").click(function()
{
    if (setTableControls())
    {
        var listAppointment = $("#appointments").val();
        var payment_method = "Efectivo";
        var data = new FormData();
        data.append("listAppointment",listAppointment);
        data.append("payment_method",payment_method);
        data.append("total",total);
        var route = "/sell/save";
        var token = $("#tokenSell").val();
        $.ajax({
            url: route,
            headers:{'X-CSRF-TOKEN':token},
            method: 'POST',
            data:data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta)
            {
                printTicket(respuesta);
                toastr.success('La venta se realizo satisfactoriamente');
                initControls();
            }
        });
    }
    else
    {
        toastr.error('El efectivo es menor al total');
    }

});

$("#deleteAll").click(function()
{
    if (total==0)
    {
        toastr.warning('No se inicio ninguna venta');
    }
    else
    {
      swal.fire({
            title: '¿Desea borrar los datos de la venta?',
            text: "¡si no lo esta puede cancelar!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'No',
            confirmButtonText: 'Si, Cancelar'
        }).then((result)=>
        {
            if (result.value)
            {
                initControls();
                initTableControls();
                toastr.info('Venta cancelada');
            }
        })  
    }    
})

var list =[];
var total = 0;

function calculateTotal()
{
    var listA = $(".listA");
    var acum = 0;
    for (var i = 0; i < listA.length; i++)
    {
        acum+=parseInt($(listA).attr("price"));
    } 
    total=acum;
    $("#total").html(acum);
}

function addAppointmentsArray()
{
    var listA = $(".listA");
    list.length=0;
    for (var i = 0; i < listA.length; i++)
    {
        list.push({ "id" : $(listA[i]).attr("idA")});
    }
    $("#appointments").val(JSON.stringify(list)); 
}

function initControls()
{
    list.length = 0;
    total = 0;
    $("#total").html("0.0");
    $("#appointments").val("");
    $("#content_table_sell").empty(); 
}

function initTableControls()
{
    $("#total_table").html("0.0");
    $("#payment_table").html("0.0");
    $("#change_table").html("0.0"); 
}

function setTableControls()
{
    var payment = $("#payment").val();
    var flag = true;

    if (payment.length!= 0)
    {
        if (payment>=total)
        {
            $("#total_table").html(total);
            $("#payment_table").html(payment);
            $("#change_table").html(parseInt(payment)-parseInt(total));
        }
        else
        {
            flag=false;
        }    
    }
    else
    {
        $("#total_table").html(total);
        $("#payment_table").html("0.0");
        $("#change_table").html("0.0");
        flag=true;
    }
    var payment = $("#payment").val("");
    return flag;
}

function printTicket(id)
{
    var mywindow = window.open('ticket/ticket.php?id='+id, 'PRINT');
    mywindow.focus(); // necessary for IE >= 10*/    
    setTimeout(function() {
        mywindow.print();
        mywindow.close();
    },300);
}

var flag = true;

$(document).click(function()
{
    if (flag)
    {
        $('#search').focus();
    }
})

$("#myInput").on("keyup", function ()
{
    var value = $(this).val().toLowerCase();
    $("#myList li").filter(function () 
    {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        console.log($(this).toggle($(this).text().toLowerCase().indexOf(value) > -1));
    });
});

function addAppointmentTable(code)
{
    var route = "/sell/search";
    var token = $("#token").val(); 
    var data = new FormData();
    data.append("code",code);
    $.ajax({
        url: route,
        headers:{'X-CSRF-TOKEN':token},
        method: 'POST',
        data:data,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta)
        {
            if(respuesta.length==0)
            {
                toastr.warning('No hay una cita por cobrar con este codigo');
            }
            else
            {
                initTableControls();

                var found = list.find(function(element) { 
                  return element.id == respuesta[3]; 
                }); 

                if (found===undefined)
                {
                    $("#content_table_sell").append("<tr>"+
                    "<td>"+respuesta[0]+"</td>"+
                    "<td>"+respuesta[2]+"</td>"+
                    "<td>"+respuesta[1]+"</td>"+
                    '<td>'+
                        '<span class="input-group-addon">'+
                        '<button type="button" class="btn btn-danger removeA listA" price="'+respuesta[1]+'" idA="'+respuesta[3]+'">'+
                            '<i class="fa fa-times"></i>'+
                        '</button>'+
                        '</span>'+
                    '</td>'+
                    "</tr>");
                    addAppointmentsArray();
                    calculateTotal();
                }
                else
                {
                    toastr.error('Esta cita ya esta en la venta');
                }                    
            }
            $("#search").val("");
        }
    })
}
