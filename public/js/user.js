$(document).ready(function () {
    $(".tableUser").DataTable({
        responsive: true,
    });
});
$(".tableUser tbody").on("click","button#delete",function()
{
	var UserId = $(this).attr("UserId");
	swal.fire({
	title: '¿Esta seguro de borrar el usuario?',
	text: "¡si no lo esta puede cancelar!",
	type: 'warning',
	showCancelButton: true,
	confirmButtonColor: '#3085d6',
	cancelButtonColor: '#d33',
	cancelButtonText: 'Cancelar',
	confirmButtonText: 'Si, borrar usuario'

	}).then((result)=>
	{
		if (result.value)
		{
			window.location = "/user/"+UserId+"/delete";
		}
	})
});

$("#newPassword").change(function(){
	var newPassword = $(this).val();
	$("#oldPassword").val(newPassword);
	$("#flag").val(1);
});


$(".newPicture").change(function()
{
	var imagen = this.files[0];
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") 
	{
		$(".newPicture").val(""); 

		swal.fire({
			title: "error al subir foto",
			text: "¡la imagen debe ser en formato JPG o PNG!",
			type: "error",
			conmfirmButtonText:"¡cerrar!"});
	}
	else 
	if(imagen["size"] > 2000000)
	{
		$(".newPicture").val(""); 
		swal.fire({
			title: "Error al subir la imagen",
			text: "la imagen no debe pesar mas de 2MB",
			type: "error",
			conmfirmButtonText: "¡Cerrar!"});
	}
	else
	{
		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);
		$(datosImagen).on("load", function(event)
		{
			var rutaImagen = event.target.result;
			$(".preview").attr("src", rutaImagen);
		})
	}
})