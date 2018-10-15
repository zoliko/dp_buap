function validaSesion(){
	var dataForm = new FormData();
        dataForm.append('inicio',"inicio");
        $.ajax({
          url :'/usuarios/act',
          data : dataForm,
          contentType:false,
          processData:false,
          headers:{
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
          type: 'POST',
          dataType : 'json',
          beforeSend: function (){
            //$("#modalCarga").modal();
          },
          success : function(json){
            if(json['sesion']==null){
            }else{
              location.href ="/listado";
            }
          },
          error : function(xhr, status) {
            $("#contenidoMensaje").text(mensaje);
            $("#modalMensaje").modal();
          },
          complete : function(xhr, status){
          }
        });
}

