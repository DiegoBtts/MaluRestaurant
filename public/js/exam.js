$(".tableExam").dataTable();

$(".tableExam tbody").on("click","button.details",function()
{
	$("#content_table_details").empty();
	var appointment_id = $(this).attr("appointmentId");
	var route = "/appointment/see/"+appointment_id;
    var token = $("#token").val(); 
    $.ajax({
        url: route,
        headers:{'X-CSRF-TOKEN':token},
        method: 'PUT',
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta)
        {
           $("#content_table_details").append("<tr>"+
           	"<td>"+respuesta[0]+"</td>"+
                "<td>"+respuesta[2]+"</td>"+
                "<td>"+respuesta[3]+"</td>"+
                "<td>"+respuesta[4]+"</td>"+
                "<td>"+respuesta[1]+"</td>"+
            "</tr>");
        }
    })
});

$(".tableExam tbody").on("click","button.print",function()
{
    var table_name = $(this).attr("table_name");
    var id_exam = $(this).attr("id_exam");
    window.open("/mpdf/resultados/resultados.php?table_name="+table_name+"&id_exam="+id_exam,"_blank");
})

