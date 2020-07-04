$(".tableGruops").dataTable();

$(".button-add").click(function()
{
	$(this).css("display","none").fadeOut('slow');;
	add_text();
});

$(".add_field").click(function()
{
	$(".button-add").css("display","none").fadeOut('slow');;
	add_text();
})

var index = 0;
var flag = 0;
function add_text()
{
		$(".conteiner-add").append('<div class="conteiner-moderate">'+

                  '<div class="row">'+

                    '<div class="col-md-12">'+

                      '<div class="row">'+
                        '<div class="col-md-12">'+
                          '<div class="pull-right">'+
                           ' <button type="button" class="close decrementsFlag" id=item'+index+'>&times;</button>'+
                         ' </div>'+
                        '</div>'+
                      '</div>'+

                     ' <div class="input-group mb-3">'+

                          '<select name="field_type[]" class="form-control" required>'+
                              '<option value="">Seleccione un tipo de dato</option>'+
                              '<option value="varchar">Texto</option>'+
                              '<option value="int">Numerico entero</option>'+
                              '<option value="float">Decimal</option>'+
                          '</select>'+

                      '</div>'+

                      ' <div class="input-group mb-3">'+

                          '<select name="required[]" class="form-control" required>'+
                              '<option value="">Seleccione si sera un campo requerido</option>'+
                              '<option value="si">Requerido</option>'+
                              '<option value="no">No requerido</option>'+
                          '</select>'+

                      '</div>'+

                      '<div class="row">'+

                        '<div class="col-md-6">'+

                         ' <div class="input-group mb-3">'+

                              '<input type="text" class="form-control" name="label[]" placeholder="Escriba aqui una etiqueta">'+

                          '</div>'+

                        '</div>'+

                        '<div class="col-md-6">'+

                          '<div class="input-group mb-3">'+

                              '<input type="text" class="form-control" name="field_name[]" placeholder="Escriba aqui el nombre del campo sin caracteres especiales" required>'+

                          '</div>'+

                       ' </div>'+

                        '<div class="col-md-6">'+

                          '<div class="input-group mb-3">'+

                              '<input type="text" class="form-control" name="tag[]" placeholder="Escriba aqui una leyenda" required>'+

                          '</div>'+

                        '</div>'+

                       ' <div class="col-md-6">'+

                          '<div class="input-group mb-3">'+

                              '<input type="text" class="form-control" name="placeholder[]" placeholder="Escriba aqui el placeholder" required>'+

                          '</div>'+

                       ' </div>'+

                      '</div>'+

                    '</div>'+
                    
                  '</div>'+

                '</div>'+

                '<script>'+

                '$("#item'+index+'").click(function()'+
            		'{'+
            		'$(this).parent().parent().parent().parent().parent().parent().remove();'+
            		'});</script>').fadeIn(1000)

		index++;
    flag++;
    console.log(flag);
}

$(".decrementsFlag").click(function()
{
  flag--;
  console.log(flag);
})

$(".tableGruops tbody").on("click","button#delete",function()
{
    var groupId = $(this).attr("groupId");
    swal.fire({
      title: '¿Esta seguro de esto?',
      text: "¡al hacerlo se borraran las citas en donde se aplico este examen!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, Eliminar'
    }).then((result)=>
    {
      if (result.value)
      {
        window.location = "/group/delete/"+groupId;
      }
    })
});
