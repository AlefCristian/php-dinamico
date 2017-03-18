    $(document).ready(function(){
        $("#cadastrar_posts").validate({
            rules:{
                thumb: {required: true},
                titulo: {required: true, minlength: 5},
                categoria: {required: true},
                data: {required: true, date: false},
                autor: {required: true}              
            },
            messages:{
                thumb: {required: "Carregue uma imagen para a postagem"},
                titulo: {required: "O título é obrigatório", minlength: "No mínimo 5 caracteres devem ser digitados"},
                categoria: {required: "Selecione a categoria"},
                data: {required: "Defina uma data", date: "Data digitada é inválida", dateISO: "O valor da data  e invalido (XX/XX/XXXX)"}
            },
        });
    });
