  $(document).ready(function(){
      $("#editar_posts").validate({
          rules:{
              titulo: {required: true, minlength: 5},
              categoria: {required: true},
              data: {required: true, date: false},
              autor: {required: true}
          },
          messages:{
              titulo: {required: "O título é obrigatório", minlength:   "No mínimo 5 caracteres devem ser digitados"},
              categoria: {required: "Selecione a categoria"},
              data: {required: "Defina uma data", date: "Data digitada é inválida"}
          },
      });
  });
